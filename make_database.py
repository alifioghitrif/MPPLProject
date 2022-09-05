from sqlalchemy import (
    create_engine,
    Table,
    Column,
    Integer,
    String,
    MetaData,
    Date,
    ForeignKey,
)
from sqlalchemy.orm import declarative_base, relationship
from sqlalchemy_utils import *

Base = declarative_base()

engine = create_engine("mysql+pymysql://root:@localhost/mppl")
if not database_exists(engine.url):
    create_database(engine.url)

meta = MetaData()


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


class dusun(Base):
    __tablename__ = "Dusun"
    DusunID = Column(Integer, autoincrement=True, primary_key=True)
    Nama_Dusun = Column(String(64))


class aparat_desa(Base):
    __tablename__ = "AparatDesa"
    AparatID = Column(Integer, autoincrement=True, primary_key=True)
    Nama = Column(String(64))
    Email = Column(String(128))


class aparatwarga(Base):
    __tablename__ = "Aparat_warga_assoc"
    aparatwargaid = Column(Integer, primary_key=True)
    aparat_id = Column(ForeignKey("AparatDesa.AparatID"))
    warga_id = Column(ForeignKey("WargaDesa.WargaID"))


meta.create_all(engine)
