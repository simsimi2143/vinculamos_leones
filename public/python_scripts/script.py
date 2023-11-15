import pandas as pd
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.preprocessing import MultiLabelBinarizer
from sklearn.model_selection import train_test_split
from sklearn.multiclass import OneVsRestClassifier
from sklearn.svm import SVC
import joblib

# Cargar modelos y vectorizer desde archivos pkl
classifier_ods = joblib.load('../public/python_scripts/classifier_ods.pkl')
classifier_metas = joblib.load('../public/python_scripts/classifier_metas.pkl')
vectorizer = joblib.load('../public/python_scripts/vectorizer.pkl')
mlb_ods = joblib.load('../public/python_scripts/mlb_ods.pkl')
mlb_metas = joblib.load('../public/python_scripts/mlb_metas.pkl')

# Función para predecir las ODS y metas en una descripción
def predict_ods_and_metas(description):
    description_vectorized = vectorizer.transform([description.encode('utf-8')])
    ods_pred = classifier_ods.predict(description_vectorized)
    ods_pred_labels = mlb_ods.inverse_transform(ods_pred)

    metas_pred = classifier_metas.predict(description_vectorized)
    metas_pred_labels = mlb_metas.inverse_transform(metas_pred)  # Utilizar el MultiLabelBinarizer para inversión

    return ods_pred_labels, metas_pred_labels

# Realizar pruebas con entradas personalizadas
input_description = input()
ods_predicted, metas_predicted = predict_ods_and_metas(input_description)
print("ODS predichos:", ods_predicted[0][0].decode('utf-8'))
print("Metas predichas:", metas_predicted[0][0].decode('utf-8'))
