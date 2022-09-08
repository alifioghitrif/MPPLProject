import re
import requests as req
from bs4 import BeautifulSoup as bes4
import json

url = "https://id.theasianparent.com/nama-bayi-laki-laki-indonesia"
page = req.get(url)
page_soup = bes4(page.content, "html.parser")

nama_laki_laki = []
for pagess in page_soup.find_all("strong"):
    nama_laki_laki.append(pagess.get_text())

nama_laki_laki.pop()

url = "https://id.theasianparent.com/nama-bayi-laki-laki-islam"
page = req.get(url)
page_soup = bes4(page.content, "html.parser")

for pagess in page_soup.select("ol > li > strong"):
    nama_laki_laki.append(pagess.get_text())
for pagess in page_soup.select("ol > li > b"):
    nama_laki_laki.append(pagess.get_text())


url = "https://id.theasianparent.com/nama-bayi-laki-laki-modern"
page = req.get(url)
page_soup = bes4(page.content, "html.parser")


for pagess in page_soup.select("ul > li > strong"):
    nama_laki_laki.append(pagess.get_text())
for pagess in page_soup.select("ul > li > b"):
    nama_laki_laki.append(pagess.get_text())

nama_laki_laki = [re.sub(r"[^\x00-\x7f]| |:", r"", i) for i in nama_laki_laki]
nama_laki_laki = list(filter(lambda a: a != "", nama_laki_laki))
nama_laki_laki = sorted(nama_laki_laki)
nama_laki_laki = set(nama_laki_laki)
nama_laki_laki = list(nama_laki_laki)


url = "https://id.theasianparent.com/nama-bayi-perempuan-modern"
page = req.get(url)
page_soup = bes4(page.content, "html.parser")

nama_perempuan = []
for pagess in page_soup.select("ul > li > strong"):
    nama_perempuan.append(pagess.get_text())
for pagess in page_soup.select("ul > li > b"):
    nama_perempuan.append(pagess.get_text())


url = "https://id.theasianparent.com/nama-bayi-perempuan-unik"
page = req.get(url)
page_soup = bes4(page.content, "html.parser")

for pagess in page_soup.select("ul > li > strong"):
    nama_perempuan.append(pagess.get_text())
for pagess in page_soup.select("ul > li > b"):
    nama_perempuan.append(pagess.get_text())
for pagess in page_soup.select("section > p > strong"):
    nama_perempuan.append(pagess.get_text())

url = "https://id.theasianparent.com/arti-nama-anak-perempuan"
page = req.get(url)
page_soup = bes4(page.content, "html.parser")

for pagess in page_soup.select("ul > li > strong"):
    nama_perempuan.append(pagess.get_text())
for pagess in page_soup.select("ul > li > b"):
    nama_perempuan.append(pagess.get_text())

url = "https://id.theasianparent.com/nama-bayi-perempuan-islami"
page = req.get(url)
page_soup = bes4(page.content, "html.parser")


for pagess in page_soup.select("ul > li > strong"):
    nama_perempuan.append(pagess.get_text())
for pagess in page_soup.select("ul > li > b"):
    nama_perempuan.append(pagess.get_text())
for pagess in page_soup.select("ol > li"):
    kata = pagess.get_text()
    kata = re.sub(r":(.)*", r"", kata)
    nama_perempuan.append(kata)

nama_perempuan = [re.sub(r"[^\x00-\x7f]| |:|[0-9]|\.", r"", i) for i in nama_perempuan]
nama_perempuan = list(filter(lambda a: a != "", nama_perempuan))
nama_perempuan = sorted(nama_perempuan)
nama_perempuan = list(filter(lambda a: len(a) < 32, nama_perempuan))
nama_perempuan = set(nama_perempuan)
nama_perempuan = list(nama_perempuan)

data_json = dict()
data_json["nama_laki_laki"] = nama_laki_laki
data_json["nama_perempuan"] = nama_perempuan
data_json["nama_dusun"] = ["Belik", "Gudang", "Jenar", "Ngululor", "Ngulurejo", "Ngulutengah", "Nguluwetan", "Tulangan"]


with open("data_json.json", "w") as jsonfileku:
    json.dump(data_json, jsonfileku)
