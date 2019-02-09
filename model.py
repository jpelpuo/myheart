# -*- coding: utf-8 -*-
"""
Created on Sun Feb  3 16:05:08 2019

@author: Jamal Pelpuo
"""

# Packages for analysis
import pandas as pd
import sys, json
import numpy as np
from sklearn import svm

# Packages for visuals
import seaborn as sns; sns.set(font_scale=1.2)

# Allows charts to appear in the notebook
#%matplotlib inlin

recipes = pd.read_csv('recipes_muffins_cupcakes.csv')

ingredients = recipes[['Flour','Sugar']].values
type_label = np.where(recipes['Type']=='Muffin', 0, 1)

# Feature names
recipe_features = recipes.columns.values[1:].tolist()

model = svm.SVC(kernel='linear')
model.fit(ingredients, type_label)

try:
    #flour = json.loads(sys.argv[1])
    #sugar = json.loads(sys.argv[2])
    flour = 50
    sugar = 20
except:
    print("ERROR")
    sys.exit(1)

if(model.predict([[flour, sugar]]))==0:
    result = {"Recipe" : "Muffin"}
else:
    result = {"Recipe" : "Cupcake"}

print(json.dumps(result))