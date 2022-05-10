<?php

declare(strict_types=1);

class Imc
{
    private float $weight = 0.00;
    private int $size = 0;  

    public function setWeight(float $weight): void
    {
        if ($weight < 0 ) {
            trigger_error(
                'Le poid est trop petit (min. 1)',
                E_USER_ERROR
            );
        }

        $this -> weight = $weight;
    }

    public function setSize(int $size): void
    {
        if ($size < 0) {
            trigger_error(
                'La taille est trop petite (min. 1)',
                E_USER_ERROR
            );
        }

        $this -> size = $size;
    }

    public function getWeight()
    {
        return $this -> weight;
    }

    public function getSize()
    {
        return $this -> size;
    }

    public function calculatorImc()
    {
        return floatval($this -> weight / (($this -> size / 100) * ($this -> size / 100)));
    }

    public function checkingCorpulence(float $resultImc)
    {
        if ($resultImc < 18.4) {
            $resultCorpulence = ['Maigre','Votre poids apparaît très insuffisant par rapport à votre taille. Cela peut être le symptôme d\'une maladie, de difficultés psychologiques, ou de malnutrition. Des carences alimentaires et d\'autres complications peuvent s\'ensuivre. Nous vous conseillons vivement de consulter un médecin qui évaluera le degré et la nature de cette insuffisance pondérale.'];             
            return $resultCorpulence;           
        } elseif ($resultImc >= 18.5 && $resultImc <= 24.9) {
            $resultCorpulence = ['Normal','Votre poids est normal par rapport à votre taille. Une alimentation saine et équilibrée, une activité physique régulière (natation, marche, vélo...) vous aideront à conserver cet équilibre tout au long de votre vie.'];
            return $resultCorpulence;
        } elseif ($resultImc >= 25.0 && $resultImc <= 29.9) {
            $resultCorpulence = ['Surpoids','Votre poids apparaît légèrement supérieur au poids normal et doit vous alerter. A long terme et chez certaines personnes, le surpoids peut nuire à votre santé et augmenter le risque de maladies cardiovasculaires, d\'hypertension artérielle, de diabète... Votre médecin sera en mesure de vous apporter les conseils adaptés à votre cas particulier.'];
            return $resultCorpulence;
        } elseif ($resultImc >= 30.0 && $resultImc <= 34.9) {
            $resultCorpulence = ['Obésité modérée','Votre poids apparaît supérieur au poids normal et doit vous alerter. A long terme le surpoids peut nuire à votre santé : il accroît nettement les risques de maladies cardiovasculaires, d\'hypertension artérielle, de diabète, d\'arthrose, de cancer, etc. Un changement dans vos habitudes de vie devrait être envisagé avec l\'aide de votre médecin. Il sera en mesure de vous apporter les conseils adaptés pour vous aider à perdre du poids.'];
            return $resultCorpulence;
        } elseif ($resultImc >= 35.0 && $resultImc <= 39.9) {
            $resultCorpulence = ['Obésité sévère','Votre poids apparaît nettement supérieur au poids normal et doit vous alerter. Le surpoids accroît très fortement les risques de maladies cardiovasculaires, d\'hypertension artérielle, de diabète, d\'arthrose, de calculs biliaires, de cancer, etc. Un changement dans vos habitudes de vie doit être envisagé et une consultation de votre médecin s\'impose. Il sera en mesure de vous apporter les conseils adaptés pour vous aider à perdre du poids.'];
            return $resultCorpulence;
        } elseif ($resultImc >= 40) {
            $resultCorpulence = ['Obésité morbide ou massive','Votre poids apparaît très nettement supérieur au poids normal et doit vous alerter. L’obésité nuit à la santé et accroît très fortement les risques de maladies cardiovasculaires, d\'hypertension artérielle, de diabète, d\'arthrose, de maladies respiratoires, de cancer, etc. Une consultation médicale s\'impose pour une prise en charge adaptée.'];
            return $resultCorpulence;
        } else {
            return 'Erreur !';
        }
    }
}