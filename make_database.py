from sqlalchemy import (
    create_engine,
    Table,
    Column,
    Integer,
    String,
    MetaData,
    Date,
    ForeignKey,
    insert,
)

from sqlalchemy.orm import declarative_base, relationship
from sqlalchemy_utils import create_database, database_exists

Base = declarative_base()

db_master = create_engine("mysql+pymysql://root:@localhost/information_schema")
db_master.execute("DROP DATABASE IF EXISTS mppl")


engine = create_engine("mysql+pymysql://root:@localhost/mppl")
if not database_exists(engine.url):
    create_database(engine.url)

meta = MetaData()

aparatwarga = Table(
    "Aparat_warga_assoc",
    Base.metadata,
    Column("aparat_id", ForeignKey("AparatDesa.AparatID")),
    Column("warga_id", ForeignKey("WargaDesa.WargaID")),
)


class dusun(Base):
    __tablename__ = "Dusun"
    DusunID = Column(Integer, autoincrement=True, primary_key=True)
    Nama_Dusun = Column(String(64))


# dusun = Table(
#     "Dusun",
#     Base.metadata,
#     Column("DusunID", Integer, autoincrement=True, primary_key=True),
#     Column("Nama_Dusun", String(64), autoincrement=True, primary_key=True),
#     Column("warga_id", ForeignKey("WargaDesa.WargaID")),
# )


class wargadesa(Base):
    __tablename__ = "WargaDesa"
    WargaID = Column(Integer, autoincrement=True, primary_key=True)
    NIK = Column(String(16))
    Nama = Column(String(64))
    Nomor_KK = Column(String(16))
    Jenis_Kelamin = Column(String(32))
    Status_Perkawinan = Column(String(32))
    Tanggal_Lahir = Column(Date)
    Pekerjaan = Column(String(64))
    Status_Dalam_Keluarga = Column(String(64))
    Nomor_Telepon = Column(String(16))
    aparat = relationship("AparatDesa", secondary=aparatwarga)
    dusun_id = Column(Integer, ForeignKey("Dusun.DusunID"))


#     dusunku = relationship("dusun", back_populates="wargadesaku")


# dusun.wargadesaku = relationship("wargadesa", back_populates="dusunku")


class aparat_desa(Base):
    __tablename__ = "AparatDesa"
    AparatID = Column(Integer, autoincrement=True, primary_key=True)
    Nama = Column(String(64))
    Email = Column(String(128))

    # wargadesa_id = Column(Integer,ForeignKey(column))


Base.metadata.create_all(engine)

stmt = insert(dusun).values(Nama_Dusun="username")
with engine.connect() as conn:
    conn.execute(stmt)
