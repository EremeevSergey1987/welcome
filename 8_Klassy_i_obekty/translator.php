<?php
class translator{
    private $dictionary = ['en'=>[], 'de'=>[],];
    private $language;

    public function __construct($language){
        $this->language = $language;

        //English
        $this->addWord('Лес', 'Forest', 'en');
        $this->addWord('Работа', 'Work','en');

        //Germany
        $this->addWord('Лес', 'Wald','de');
        $this->addWord('Работа', 'Arbeit', 'de');

    }

    public function addWord(string $russianWord, string $translation, $language){
        if(array_key_exists($translation, $this->dictionary[$this->language])){
            return;
        }
        $this->dictionary[$this->language][$translation] = $russianWord;
    }

    public function translate($foreingWord){
        if(array_key_exists($foreingWord, $this->dictionary[$this->language])){
            return $this->dictionary[$this->language][$foreingWord] . PHP_EOL;
        }
        return false;
    }
}

$translationEn = new translator('en');
$translationDe = new translator('de');

echo $translationDe->translate('Wald') . PHP_EOL;
echo $translationEn->translate('Forest') . PHP_EOL;









