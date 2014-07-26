<?php

class Tscale extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function export()
    {
        // check if the scalemodel already exists:
        $makeId = Make::model()->find('name=:name',array('name'=>$this->merk))->id;
        $scalemodel = ScaleModel::model()->find('make_id=:make_id and reference=:reference',array('make_id'=>$makeId,'reference'=>$this->referentie));

        if (empty($scalemodel->id)) {
            if(empty($this->type_id)){
                $typeId = Type::model()->with('make')->find('concat(make.name," ",t.name)=:type',array(':type'=>$this->car))->id;
                if (!empty($typeId)){
                    $this->type_id = $typeId;
                }
            }

            if(empty($this->category_id)){
                $categoryId = ModelCategory::model()->find('domain=:domain and description=:description'
                    ,array('domain'=>'MGY','description'=>$this->categorie))->id;
                if(!empty($categoryId)){
                    $this->category_id = $categoryId;
                }
            }
			
			if (empty($this->scale_id) && !empty($this->schaal)) {
				$scale = Scale::model()->find('code=:code', array('code'=> $this->schaal));
				if (!empty($scale->id)) {
					$this->scale_id = $scale->id;
				}
			}

            $scalemodel = new Scalemodel();
            $scalemodel->make_id = $makeId;
            $scalemodel->type_id = $this->type_id;
            if (substr($this->referentie,0,3) == 'TEN'){
                $this->referentie = str_replace('-',' ',$this->referentie);
            }
            $scalemodel->reference = $this->referentie;
            $scalemodel->description = $this->omschrijving;
            $scalemodel->category_id = $this->category_id;
            $scalemodel->scale_id = $this->scale_id;
            if ($scalemodel->save()){
                $this->deleted = 1;
                return $this->save();
            } else {
                return false;
            }
        } else {
            $this->deleted = 1;
            return $this->save();
        }
    }

    public function tableName()
    {
        return '{{tracks_tscale}}';
    }

    public function rules()
    {
        return array(
            array('merk, referentie, car, omschrijving', 'required'),
            array('type_id, category_id, deleted', 'numerical', 'integerOnly'=>true),
            array('merk, referentie, car, omschrijving', 'length', 'max'=>255),
            array('categorie', 'length', 'max'=>250),
            array('id, merk, referentie, car, omschrijving, categorie, type_id, category_id, deleted', 'safe', 'on'=>'search'),
        );
    }

    public function relations()
    {
        return array
        ( 'type' => array(self::BELONGS_TO, 'Type', 'type_id')
         , 'modelcategory' => array(self::BELONGS_TO, 'ModelCategory', 'category_id')
         );
    }


    public function behaviors()
    {
        return array(
            'ERememberFiltersBehavior' => array(
                'class' => 'application.components.ERememberFiltersBehavior',
                'defaults'=>array(),           /* optional line */
                'defaultStickOnClear'=>false   /* optional line */
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('app', 'ID'),
            'merk' => Yii::t('app', 'Merk'),
            'referentie' => Yii::t('app', 'Referentie'),
            'car' => Yii::t('app', 'Car'),
            'omschrijving' => Yii::t('app', 'Omschrijving'),
            'categorie' => Yii::t('app', 'Categorie'),
            'type_id' => Yii::t('app', 'Type'),
            'category_id' => Yii::t('app', 'Category'),
            'deleted' => Yii::t('app', 'Deleted'),
        );
    }

    public function search()
    {
        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);

        $criteria->compare('merk',$this->merk,true);

        $criteria->compare('referentie',$this->referentie,true);

        $criteria->compare('car',$this->car,true);

        $criteria->compare('omschrijving',$this->omschrijving,true);

        $criteria->compare('categorie',$this->categorie,true);

        $criteria->compare('type_id',$this->type_id);

        $criteria->compare('category_id',$this->category_id);

        $criteria->compare('deleted',0); // only not deleted

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        ));
    }
}
