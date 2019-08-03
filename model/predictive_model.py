# -*- coding: utf-8 -*-
"""
Created on Tue Feb 19 08:10:54 2019

@author: Jamal Pelpuo
"""

#packages for analysis
import pandas as pd
#import numpy as np
from sklearn import svm
from sklearn.model_selection import train_test_split
import json

#Column names
col_names = ['age','sex','chest_pain','blood_pressure','serum_cholestoral','fasting_blood_sugar', 'resting_ECG',
             'max_heart_rate','induced_angina','ST_depression','slope','no_of_vessels','thal','diagnosis']


datasets =pd.read_csv("C:/xampp/htdocs/myHeart/model/processed.cleveland.data-1.csv",names=col_names, header=None, na_values="?")


#Compress 1-4 values to 1
datasets.diagnosis = (datasets.diagnosis != 0).astype(int)

#Extract target variable
X = datasets.iloc[:, :-1]
y = datasets.iloc[:, -1]

# split the data
#X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=300)

model = svm.SVC(kernel = 'linear',C=0.05, probability=True)
model.fit(X,y)

fit_accuracy = model.score(X, y.values.ravel())

def runPrediction(age, sex, chest_pain, blood_pressure, serum_cholestoral, fasting_blood_sugar, resting_ECG, max_heart_rate, induced_angina, ST_depression, slope, no_of_vessels, thal):
#	Get diagnosis value
	diagnosis = model.predict([[age, sex, chest_pain, blood_pressure, serum_cholestoral, 					fasting_blood_sugar, resting_ECG, max_heart_rate, induced_angina, ST_depression, slope, 			no_of_vessels, thal]])
	
#	Get diagnosis probability
	diagnosis_probability = model.predict_proba([[age, sex, chest_pain, blood_pressure, 					serum_cholestoral, fasting_blood_sugar, resting_ECG, max_heart_rate, induced_angina, 				ST_depression, slope, no_of_vessels, thal]])[:,1]
	
#	Print the results
	if(diagnosis == 0):
		result = {"Diagnosis" : "0", "Probability" : f"{diagnosis_probability[0]}"}
	else:
		result = {"Diagnosis" : "1", "Probability" : f"{diagnosis_probability[0]}"}
	print(json.dumps(result))
	return

	
   