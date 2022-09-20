from sqlalchemy import create_engine, Table, Column, Integer, String, MetaData, Date, ForeignKey, insert, select
from sqlalchemy.orm import declarative_base, relationship, Session, sessionmaker
from sqlalchemy_utils import create_database, database_exists
import json
import random
import numpy as np

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
    dusunku = relationship("wargadesa")

    # def __iter__(self):
    #     return self

    # def __iter__(self):
    #     dictio = dict()
    #     dictio = {"DusunID": "1", "Nama_Dusun": "2"}
    #     dictio["DusunID"] = self.DusunID
    #     dictio["Nama_Dusun"] = self.Nama_Dusun
    #     yield dictio


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
    aparat = relationship("aparat_desa", secondary=aparatwarga)
    dusun_id = Column(Integer, ForeignKey("Dusun.DusunID"))


class aparat_desa(Base):
    __tablename__ = "AparatDesa"
    AparatID = Column(Integer, autoincrement=True, primary_key=True)
    Nama = Column(String(64))
    Email = Column(String(128))

    # def __repr__(self):
    #     dictio = dict()
    #     dictio["AparatID"] = self.AparatID
    #     dictio["Nama"] = self.Nama
    #     dictio["Email"] = self.Email
    #     return dictio


Base.metadata.create_all(engine)

# Opening JSON file
with open("data_json.json", "r") as openfile:
    data_masukan = json.load(openfile)

# Masukkan Dusun
for nama_dusun in data_masukan["nama_dusun"]:
    stmt = insert(dusun).values(Nama_Dusun=nama_dusun)
    with engine.connect() as conn:
        conn.execute(stmt)

connection = engine.connect()
stmt = select(dusun)
data = connection.execute(stmt)
data = list(data)
kolom_dusun = dusun.__table__.columns.keys()
hasil = list(map(list, zip(*data)))
indeks = 0
for i in kolom_dusun:
    globals()[i] = hasil[indeks]
    indeks += 1

DusunID

No_keluarga = "331223"



# for i in range(5):
#     print(result[i])
# for res in result:
#     print(res.DusunID)
# Masukkan Warga Desa
# for _ in range(2000):
#     kelamin = random.choice(data_masukan["jenis_kelamin"])
#     if kelamin == "Laki-Laki":
#         first_name = random.choice(data_masukan["nama_laki_laki"])
#         middle_name = random.choice(data_masukan["nama_laki_laki"])
#         last_name = random.choice(data_masukan["nama_laki_laki"])
#     else:
#         first_name = random.choice(data_masukan["nama_perempuan"])
#         middle_name = random.choice(data_masukan["nama_perempuan"])
#         last_name = random.choice(data_masukan["nama_perempuan"])
#         nameku = first_name + middle_name + last_name
#     nameku = first_name + " " + middle_name + " " + last_name
#     email = first_name + last_name + "@gmail.com"
#     stmt = insert(aparat_desa).values(Nama=nameku, Email=email)
#     with engine.connect() as conn:
#         conn.execute(stmt)


# Masukkan Aparat
# for _ in range(10):
#     kelamin = random.choice(data_masukan["jenis_kelamin"])
#     if kelamin == "Laki-Laki":
#         first_name = random.choice(data_masukan["nama_laki_laki"])
#         middle_name = random.choice(data_masukan["nama_laki_laki"])
#         last_name = random.choice(data_masukan["nama_laki_laki"])
#     else:
#         first_name = random.choice(data_masukan["nama_perempuan"])
#         middle_name = random.choice(data_masukan["nama_perempuan"])
#         last_name = random.choice(data_masukan["nama_perempuan"])
#         nameku = first_name + middle_name + last_name
#     nameku = first_name + " " + middle_name + " " + last_name
#     email = first_name + last_name + "@gmail.com"
#     stmt = insert(aparat_desa).values(Nama=nameku, Email=email)
#     with engine.connect() as conn:
#         conn.execute(stmt)
