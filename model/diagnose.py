# -*- coding: utf-8 -*-
"""
Created on Wed May 29 06:56:11 2019

@author: Jamal Pelpuo
"""

import predictive_model as predict
import sys, json


try:
	data = json.loads(sys.argv[1])
	age = data[0]
	sex = data[1]
	chest_pain = data[2]
	blood_pressure = data[3]
	serum_cholestoral = data[4]
	fasting_blood_sugar = data[5]
	resting_ECG = data[6]
	max_heart_rate = data[7]
	induced_angina = data[8]
	ST_depression = data[9]
	slope = data[10]
	no_of_vessels = data[11]
	thal = data[12]

    
except:
    print("ERROR")
    sys.exit(1)


predict.runPrediction(age, sex, chest_pain, blood_pressure, serum_cholestoral, fasting_blood_sugar, resting_ECG, max_heart_rate, induced_angina, ST_depression, slope, no_of_vessels, thal)

