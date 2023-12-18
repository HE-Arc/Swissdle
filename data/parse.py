# Packages needed : pandas, openpyxl
import pandas as pd

# File paths
city_pics = './city_pics.xlsx'
data_swiss_city = './data_swiss_city.csv'
data_population = './data_population.xlsx'

# Read data from Excel and CSV files
city_pics_df = pd.read_excel(city_pics, header=None)
data_swiss_city_df = pd.read_csv(data_swiss_city, delimiter=';')
data_population_df = pd.read_excel(data_population)

# Remove leading and trailing whitespaces from city names in both DataFrames
city_pics_df[0] = city_pics_df[0].str.strip()
data_swiss_city_df['Ortschaftsname'] = data_swiss_city_df['Ortschaftsname'].str.strip()

# Merge based on the city name
merged_df = pd.merge(city_pics_df, data_swiss_city_df, left_on=city_pics_df.columns[0], right_on='Ortschaftsname')

# Rename columns and drop unnecessary ones
merged_df = merged_df.rename(columns={0: 'City', 1: 'Img_link', 'Kantonskürzel': 'Canton', 'Sprache': 'Language'}).drop(['Ortschaftsname', 'Zusatzziffer', 'Gemeindename', 'BFS-Nr', 'PLZ'], axis=1)

# Keep only the first occurrence of each city
merged_df = merged_df.drop_duplicates(subset='City', keep='first')

# Find cities from test1 that are not in the merged file
missing_cities = city_pics_df[~city_pics_df[0].isin(merged_df['City'])]

# Merge data from data_population.xlsx
final_df = pd.merge(merged_df, data_population_df, left_on='City', right_on=data_population_df.columns[0], how='left')

# Rename columns and drop unnecessary ones
final_df = final_df.rename(columns={8606033: 'Population'}).drop(['Schweiz / Suisse', 7785806, 10.5, 2, 7288010, 6873687,6365960, 6269783, 4066400], axis=1)

# Save the final merged data to a new Excel file
final_df.to_excel('./swissdle_data.xlsx', index=False)