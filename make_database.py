from sqlalchemy import create_engine,Table,Column,Integer,String,MetaData,Date
from sqlalchemy_utils import *

engine = create_engine("mysql+pymysql://root:@localhost/mppl")
if not database_exists(engine.url):
    create_database(engine.url)

meta = MetaData()

penduduk = Table(
    'penduduk',meta,
    Column('Id',Integer,autoincrement=True),
    Column('NIK',String(16),primary_key=True),
    Column('Nomor KK',String(16)),
    Column('Jenis Kelamin',String(32)),
    Column('Status Perkawinan',String(32)),
    Column('Nomor Rumah',String(9)),
    Column('Tanggal Lahir',Date),
    Column('Pekerjaan',String(64)),
    Column('Status Dalam Keluarga',String(64)),
    Column('Nomor Telepon',String(16))
)

meta.create_all(engine)