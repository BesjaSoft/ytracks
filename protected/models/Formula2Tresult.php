<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formula2Tresult
 *
 * @author fred
 */
class Formula2Tresult extends Tresult {

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tresult the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @name readContent
     * @abstract reads the contenttable and converts them into tResult
     * there are a different implementations based on the source, so differences are
     * covered within the different classes.
     */
    public function readContent($key, $catId) {

        $this->list = Content::model()->findAll('catid = :cat', array('cat' => $catId));

        echo 'Key : ' . $key . "\n";
        echo 'Category : ' . $catId . "\n";
        echo 'Articles:' . count($this->list) . "\n";

        foreach ($this->list as $article) {
            echo 'article:' . $article->title . "\n";

            if (lower(substr($article->title, 0, 2)) == 'f2') {
                
            } elseif (lower(substr($article->title, 0, 2)) == 'f3') {
                
            }
        }

        echo 'results : ' . $this->results . "\n";
        echo 'found   : ' . $this->found . "\n";
        echo 'added   : ' . $this->added . "\n";
        echo '******** end of convert results **********' . "\n";
    }

}
