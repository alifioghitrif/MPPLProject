#!/usr/bin/env python
# coding: utf-8

# # Make DataBase

# In[1]:


from sqlalchemy import create_engine, Table, Column, Integer, String, MetaData, Date, ForeignKey, insert, select
from sqlalchemy.orm import declarative_base, relationship, Session, sessionmaker
from sqlalchemy_utils import create_database, database_exists
import json
import random
import numpy as np
import pandas as pd
from datetime import date


# In[2]:


Base = declarative_base()

db_master = create_engine("mysql+pymysql://root:@localhost/information_schema")
db_master.execute("DROP DATABASE IF EXISTS mppl")


# In[3]:


engine = create_engine("mysql+pymysql://root:@localhost/mppl")
if not database_exists(engine.url):
    create_database(engine.url)


# In[4]:


meta = MetaData()


# In[5]:


aparatwarga = Table(
    "Aparat_warga_assoc",
    Base.metadata,
    Column("aparat_id", ForeignKey("AparatDesa.AparatID")),
    Column("warga_id", ForeignKey("WargaDesa.WargaID")),
)


# In[6]:


class dusun(Base):
    __tablename__ = "Dusun"
    DusunID = Column(Integer, autoincrement=True, primary_key=True)
    Nama_Dusun = Column(String(64))
    dusunku = relationship("wargadesa")


# In[7]:


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


# In[8]:


class aparat_desa(Base):
    __tablename__ = "AparatDesa"
    AparatID = Column(Integer, autoincrement=True, primary_key=True)
    Nama = Column(String(64))
    Email = Column(String(128))


# In[9]:


Base.metadata.create_all(engine)


# In[10]:


with open("data_json.json", "r") as openfile:
    data_masukan = json.load(openfile)


# In[11]:


for nama_dusun in data_masukan["nama_dusun"]:
    stmt = insert(dusun).values(Nama_Dusun=nama_dusun)
    with engine.connect() as conn:
        conn.execute(stmt)


# In[12]:


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


# # Masukkan Data Warga Desa

# In[13]:


data_masukan["tanggal_lahir"] = np.array(data_masukan["tanggal_lahir"],dtype='datetime64')
data_masukan["tanggal_lahir"]


# In[14]:


from datetime import date
tanggal_belum_kawin = data_masukan["tanggal_lahir"][((date.today().year - data_masukan["tanggal_lahir"].astype('datetime64[Y]').astype("int64") - 1970) >= 17) & ((date.today().year - data_masukan["tanggal_lahir"].astype('datetime64[Y]').astype("int64") - 1970) < 25)]
tanggal_kawin = data_masukan["tanggal_lahir"][((date.today().year - data_masukan["tanggal_lahir"].astype('datetime64[Y]').astype("int64") - 1970) >= 25)]


# In[15]:


prefix_telepon = ['0852','0853','0811','0812','0813','0821','0822','0851','0896','0895',
                    '0897','0898','0899','0817','0818','0819','0859','0877','0878','0813','0832',
                    '0833','0838','0881','0882','0883','0884','0885','0886','0887','0888','0889']


# In[16]:


tabel_dusun = pd.read_sql_query('SELECT * FROM dusun',engine)

# buat seberapa keluarganya
kk_rand_4dig = [str(i).zfill(4) for i in range(10000)]

import datetime
for wargaid in range(10000):
    Nomor_KK  = "331223"
    Nomor_KTP = "331223"
    status_kawin = random.choice(data_masukan["status_perkawinan"])
    dusunidku = random.choice(tabel_dusun['DusunID'].tolist())
    if(status_kawin == "Belum Kawin"):
        tanggal_lahir      = random.choice(tanggal_belum_kawin)
        usia               = date.today().year - (1970 + tanggal_lahir.astype('datetime64[Y]').astype("int64"))
        tanggal_kk         = tanggal_lahir - np.timedelta64(17*365,'D')
        tanggal_kk         = tanggal_kk.astype(datetime.datetime)
        tanggal_kk         = tanggal_kk.strftime('%d%m%y')
        tanggal_kkt        = tanggal_kk
        Nomor_KK          += tanggal_kk
        Nomor_KK          += random.choice(kk_rand_4dig)
        jenis_kelamin      = random.choice(data_masukan["jenis_kelamin"])
        nama               = ''
        tanggal_kkt_kel    = int(tanggal_kkt[:2])
        tanggal_kkt_antkel = tanggal_kkt[2:]
        if(jenis_kelamin=='Laki-Laki'):
            first_name = random.choice(data_masukan["nama_laki_laki"])
            last_name  = random.choice(data_masukan["nama_laki_laki"])
        else:
            first_name = random.choice(data_masukan["nama_perempuan"])
            last_name  = random.choice(data_masukan["nama_perempuan"])
            tanggal_kkt_kel += 50
            tanggal_kkt = str(tanggal_kkt_kel) + tanggal_kkt_antkel
        nama       = first_name + ' ' + last_name

        Nomor_KTP += tanggal_kkt
        Nomor_KTP += random.choice(kk_rand_4dig)
        pekerjaan  = random.choice(data_masukan['pekerjaan'])
        status_kel = 'Kepala Keluarga'
        nomor_telepon = random.choice(prefix_telepon) + ''.join([str(random.randint(0, 9)) for _ in range(6)])
        # ['WargaID','NIK','Nama','Nomor_KK','Jenis_Kelamin','Status_Perkawinan','Tanggal_Lahir','Pekerjaan','Status_Dalam_Keluarga','Nomor_Telepon','dusun_id']
        #ini aja
        stmt = insert(wargadesa).values(NIK=Nomor_KTP,Nama=nama,Nomor_KK=Nomor_KK,Jenis_Kelamin=jenis_kelamin,Status_Perkawinan=status_kawin,
                                        Tanggal_Lahir=tanggal_lahir,Pekerjaan=pekerjaan,Status_Dalam_Keluarga=status_kel,Nomor_Telepon=nomor_telepon,
                                        dusun_id = dusunidku)
        with engine.connect() as conn:
            conn.execute(stmt)

    elif(status_kawin == "Kawin"):
        tanggal_lahir = random.choice(tanggal_kawin)
        usia = date.today().year - (1970 + tanggal_lahir.astype('datetime64[Y]').astype("int64"))
        tanggal_kk = tanggal_lahir - np.timedelta64(25*365,'D')
        tanggal_kk = tanggal_kk.astype(datetime.datetime)
        tanggal_kk  = tanggal_kk.strftime('%d%m%y')
        tanggal_kkt        = tanggal_kk
        Nomor_KK          += tanggal_kk
        Nomor_KK += tanggal_kk
        Nomor_KK += random.choice(kk_rand_4dig)
        status_kel = 'Kepala Keluarga'
        jenis_kelamin = "Laki-Laki"
        Nomor_KTP += tanggal_kkt
        Nomor_KTP += random.choice(kk_rand_4dig)
        first_name = random.choice(data_masukan["nama_laki_laki"])
        last_name  = random.choice(data_masukan["nama_laki_laki"])
        nama       = first_name + ' ' + last_name
        pekerjaan  = random.choice(data_masukan['pekerjaan'])
        nomor_telepon = random.choice(prefix_telepon) + ''.join([str(random.randint(0, 9)) for _ in range(6)])
        stmt = insert(wargadesa).values(NIK=Nomor_KTP,Nama=nama,Nomor_KK=Nomor_KK,Jenis_Kelamin=jenis_kelamin,Status_Perkawinan=status_kawin,
                                        Tanggal_Lahir=tanggal_lahir,Pekerjaan=pekerjaan,Status_Dalam_Keluarga=status_kel,Nomor_Telepon=nomor_telepon,
                                        dusun_id = dusunidku)
        with engine.connect() as conn:
            conn.execute(stmt)

        Nomor_KTP = "331223"
        tanggal_lahir = random.choice(tanggal_kawin)
        usia = date.today().year - (1970 + tanggal_lahir.astype('datetime64[Y]').astype("int64"))
        tanggal_kk = tanggal_lahir - np.timedelta64(25*365,'D')
        tanggal_kk = tanggal_kk.astype(datetime.datetime)
        tanggal_kk  = tanggal_kk.strftime('%d%m%y')
        tanggal_kkt        = tanggal_kk
        tanggal_kkt_kel    = int(tanggal_kkt[:2])
        tanggal_kkt_antkel = tanggal_kkt[2:]
        tanggal_kkt_kel += 50
        tanggal_kkt = str(tanggal_kkt_kel) + tanggal_kkt_antkel
        status_kel = 'Istri'
        jenis_kelamin = "Perempuan"
        Nomor_KTP += tanggal_kkt
        Nomor_KTP += random.choice(kk_rand_4dig)
        first_name = random.choice(data_masukan["nama_perempuan"])
        last_name  = random.choice(data_masukan["nama_perempuan"])
        nama       = first_name + ' ' + last_name
        pekerjaan  = random.choice(data_masukan['pekerjaan'])
        nomor_telepon = random.choice(prefix_telepon) + ''.join([str(random.randint(0, 9)) for _ in range(6)])
        stmt = insert(wargadesa).values(NIK=Nomor_KTP,Nama=nama,Nomor_KK=Nomor_KK,Jenis_Kelamin=jenis_kelamin,Status_Perkawinan=status_kawin,
                                        Tanggal_Lahir=tanggal_lahir,Pekerjaan=pekerjaan,Status_Dalam_Keluarga=status_kel,Nomor_Telepon=nomor_telepon,
                                        dusun_id = dusunidku)
        with engine.connect() as conn:
            conn.execute(stmt)

        jumlah_anak = random.randint(0,5)
        if(jumlah_anak != 0):
            for i in range(jumlah_anak):
                Nomor_KTP = "331223"
                tanggal_lahir      = random.choice(tanggal_belum_kawin)
                usia               = date.today().year - (1970 + tanggal_lahir.astype('datetime64[Y]').astype("int64"))
                tanggal_kk         = tanggal_lahir - np.timedelta64(17*365,'D')
                tanggal_kk         = tanggal_kk.astype(datetime.datetime)
                tanggal_kk         = tanggal_kk.strftime('%d%m%y')
                tanggal_kkt        = tanggal_kk
                jenis_kelamin      = random.choice(data_masukan["jenis_kelamin"])
                nama               = ''
                tanggal_kkt_kel    = int(tanggal_kkt[:2])
                tanggal_kkt_antkel = tanggal_kkt[2:]
                if(jenis_kelamin=='Laki-Laki'):
                    first_name = random.choice(data_masukan["nama_laki_laki"])
                    last_name  = random.choice(data_masukan["nama_laki_laki"])
                else:
                    first_name = random.choice(data_masukan["nama_perempuan"])
                    last_name  = random.choice(data_masukan["nama_perempuan"])
                    tanggal_kkt_kel += 50
                    tanggal_kkt = str(tanggal_kkt_kel) + tanggal_kkt_antkel
                nama       = first_name + ' ' + last_name

                Nomor_KTP += tanggal_kkt
                Nomor_KTP += random.choice(kk_rand_4dig)
                pekerjaan  = random.choice(data_masukan['pekerjaan'])
                status_kel = 'Anak'
                nomor_telepon = random.choice(prefix_telepon) + ''.join([str(random.randint(0, 9)) for _ in range(6)])
                # ['WargaID','NIK','Nama','Nomor_KK','Jenis_Kelamin','Status_Perkawinan','Tanggal_Lahir','Pekerjaan','Status_Dalam_Keluarga','Nomor_Telepon','dusun_id']
                #ini aja
                stmt = insert(wargadesa).values(NIK=Nomor_KTP,Nama=nama,Nomor_KK=Nomor_KK,Jenis_Kelamin=jenis_kelamin,Status_Perkawinan=status_kawin,
                                                Tanggal_Lahir=tanggal_lahir,Pekerjaan=pekerjaan,Status_Dalam_Keluarga=status_kel,Nomor_Telepon=nomor_telepon,
                                                dusun_id = dusunidku)
                with engine.connect() as conn:
                    conn.execute(stmt)
    else:
        tanggal_lahir = random.choice(tanggal_kawin)
        usia = date.today().year - (1970 + tanggal_lahir.astype('datetime64[Y]').astype("int64"))
        tanggal_kk = tanggal_lahir - np.timedelta64(25*365,'D')
        tanggal_kk = tanggal_kk.astype(datetime.datetime)
        tanggal_kk  = tanggal_kk.strftime('%d%m%y')
        tanggal_kkt        = tanggal_kk
        Nomor_KK          += tanggal_kk
        Nomor_KK += tanggal_kk
        Nomor_KK += random.choice(kk_rand_4dig)
        status_kel = 'Kepala Keluarga'
        Nomor_KTP += tanggal_kkt
        Nomor_KTP += random.choice(kk_rand_4dig)
        
        tanggal_kkt_kel    = int(tanggal_kkt[:2])
        tanggal_kkt_antkel = tanggal_kkt[2:]
        if(jenis_kelamin=='Laki-Laki'):
            first_name = random.choice(data_masukan["nama_laki_laki"])
            last_name  = random.choice(data_masukan["nama_laki_laki"])
        else:
            first_name = random.choice(data_masukan["nama_perempuan"])
            last_name  = random.choice(data_masukan["nama_perempuan"])
            tanggal_kkt_kel += 50
            tanggal_kkt = str(tanggal_kkt_kel) + tanggal_kkt_antkel
        nama       = first_name + ' ' + last_name

        pekerjaan  = random.choice(data_masukan['pekerjaan'])
        nomor_telepon = random.choice(prefix_telepon) + ''.join([str(random.randint(0, 9)) for _ in range(6)])
        stmt = insert(wargadesa).values(NIK=Nomor_KTP,Nama=nama,Nomor_KK=Nomor_KK,Jenis_Kelamin=jenis_kelamin,Status_Perkawinan=status_kawin,
                                        Tanggal_Lahir=tanggal_lahir,Pekerjaan=pekerjaan,Status_Dalam_Keluarga=status_kel,Nomor_Telepon=nomor_telepon,
                                        dusun_id = dusunidku)
        with engine.connect() as conn:
            conn.execute(stmt)

        jumlah_anak = random.randint(0,5)
        if(jumlah_anak != 0):
            for i in range(jumlah_anak):
                Nomor_KTP          = "331223"
                tanggal_lahir      = random.choice(tanggal_belum_kawin)
                usia               = date.today().year - (1970 + tanggal_lahir.astype('datetime64[Y]').astype("int64"))
                tanggal_kk         = tanggal_lahir - np.timedelta64(17*365,'D')
                tanggal_kk         = tanggal_kk.astype(datetime.datetime)
                tanggal_kk         = tanggal_kk.strftime('%d%m%y')
                tanggal_kkt        = tanggal_kk
                jenis_kelamin      = random.choice(data_masukan["jenis_kelamin"])
                nama               = ''
                tanggal_kkt_kel    = int(tanggal_kkt[:2])
                tanggal_kkt_antkel = tanggal_kkt[2:]
                if(jenis_kelamin=='Laki-Laki'):
                    first_name = random.choice(data_masukan["nama_laki_laki"])
                    last_name  = random.choice(data_masukan["nama_laki_laki"])
                else:
                    first_name = random.choice(data_masukan["nama_perempuan"])
                    last_name  = random.choice(data_masukan["nama_perempuan"])
                    tanggal_kkt_kel += 50
                    tanggal_kkt = str(tanggal_kkt_kel) + tanggal_kkt_antkel
                nama       = first_name + ' ' + last_name

                Nomor_KTP += tanggal_kkt
                Nomor_KTP += random.choice(kk_rand_4dig)
                pekerjaan  = random.choice(data_masukan['pekerjaan'])
                status_kel = 'Anak'
                nomor_telepon = random.choice(prefix_telepon) + ''.join([str(random.randint(0, 9)) for _ in range(6)])
                # ['WargaID','NIK','Nama','Nomor_KK','Jenis_Kelamin','Status_Perkawinan','Tanggal_Lahir','Pekerjaan','Status_Dalam_Keluarga','Nomor_Telepon','dusun_id']
                #ini aja
                stmt = insert(wargadesa).values(NIK=Nomor_KTP,Nama=nama,Nomor_KK=Nomor_KK,Jenis_Kelamin=jenis_kelamin,Status_Perkawinan=status_kawin,
                                                Tanggal_Lahir=tanggal_lahir,Pekerjaan=pekerjaan,Status_Dalam_Keluarga=status_kel,Nomor_Telepon=nomor_telepon,
                                                dusun_id = dusunidku)
                with engine.connect() as conn:
                    conn.execute(stmt)
    
    


# In[17]:


wargadesaku = pd.read_sql_query('SELECT * FROM wargadesa',engine)
desaku = wargadesaku[wargadesaku.Pekerjaan == "PEGAWAI NEGERI SIPIL"]
for ind,row in desaku.iterrows():
    emaildasar = '.'.join(row['Nama'].split()) + '@gmail.com'
    stmt = insert(aparat_desa).values(Nama=row['Nama'],Email=emaildasar)
    with engine.connect() as conn:
        conn.execute(stmt)

tabel_aparat = pd.read_sql_query('SELECT * FROM AparatDesa',engine)
print("tabel_aparat")
print(tabel_aparat)

