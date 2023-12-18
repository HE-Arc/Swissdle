import json

from pyproj import Proj, transform

lv95 = Proj(init='epsg:2056')  # LV95
wgs84 = Proj(init='epsg:4326')  # WGS84

with open('wrong_coord_format_swissdle_data.json', 'r', encoding='utf-8') as file:
    data = json.load(file)

    for city in data:
        e = city['E']
        n = city['N']

        lon, lat = transform(lv95, wgs84, e, n)

        city['E'] = lon
        city['N'] = lat

    with open('swissdle_data.json', 'w', encoding='utf-8') as file:
        json.dump(data, file, ensure_ascii=False, indent=4)

