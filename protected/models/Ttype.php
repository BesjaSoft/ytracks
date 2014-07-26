<?php

/**
 * This is the model class for table "{{tracks_ttypes}}".
 *
 * The followings are the available columns in table '{{tracks_ttypes}}':
 * @property integer $id
 * @property integer $content_id
 * @property integer $type_id
 * @property string $name
 * @property string $tuner
 * @property string $country
 * @property string $year
 * @property string $engine
 * @property string $engine_type
 * @property string $cams
 * @property string $valves_cyl
 * @property string $compression
 * @property string $bore
 * @property string $stroke
 * @property string $capacity_cc
 * @property string $power_at_revs
 * @property string $torque
 * @property string $induction
 * @property string $ignition
 * @property string $fuel_system
 * @property string $chassis_type
 * @property string $body_type
 * @property string $designer
 * @property string $front_suspension
 * @property string $rear_suspension
 * @property string $shock_absorbers
 * @property string $engine_position
 * @property string $wheelbase_mm
 * @property string $front_track_mm
 * @property string $rear_track_mm
 * @property string $weight_kg
 * @property string $drive
 * @property string $number_of_gears
 * @property string $gearbox
 * @property string $fuel_tank_size_litres
 * @property string $brakes
 * @property string $front_brake_type
 * @property string $rear_brake_type
 * @property string $front_rims
 * @property string $rear_rims
 * @property string $tyres
 * @property string $front_tyres
 * @property string $rear_tyres
 * @property string $maximum_speed_kph
 * @property integer $error
 * @property string $created
 * @property string $modified
 * @property integer $deleted
 * @property string $deleted_date
 */
class Ttype extends BaseModel {

    private $added = 0;
    private $updated = 0;

    /**
     * Returns the static model of the specified AR class.
     * @return Ttype the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{tracks_ttypes}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, created', 'required'),
            array('content_id, type_id, error, deleted', 'numerical', 'integerOnly' => true),
            array('name, tuner, country, engine, engine_type, induction, ignition, fuel_system, chassis_type, designer, front_suspension, rear_suspension, shock_absorbers, gearbox, brakes, front_brake_type, rear_brake_type, front_rims, rear_rims, tyres, front_tyres, rear_tyres', 'length', 'max' => 255),
            array('year, cams, valves_cyl, compression, bore, stroke, capacity_cc, torque, wheelbase_mm, front_track_mm, rear_track_mm, weight_kg, drive, number_of_gears, fuel_tank_size_litres, maximum_speed_kph', 'length', 'max' => 20),
            array('power_at_revs, body_type, engine_position', 'length', 'max' => 50),
            array('modified, deleted_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, content_id, type_id, name, tuner, country, year, engine, engine_type, cams, valves_cyl, compression, bore, stroke, capacity_cc, power_at_revs, torque, induction, ignition, fuel_system, chassis_type, body_type, designer, front_suspension, rear_suspension, shock_absorbers, engine_position, wheelbase_mm, front_track_mm, rear_track_mm, weight_kg, drive, number_of_gears, gearbox, fuel_tank_size_litres, brakes, front_brake_type, rear_brake_type, front_rims, rear_rims, tyres, front_tyres, rear_tyres, maximum_speed_kph, error, created, modified, deleted, deleted_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
            'make' => array(self::BELONGS_TO, 'Make', 'make_id'),
            'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'content_id' => 'Content',
            'make_id' => 'Make',
            'type_id' => 'Type',
            'name' => 'Name',
            'tuner' => 'Tuner',
            'country' => 'Country',
            'year' => 'Year',
            'engine' => 'Engine',
            'engine_type' => 'Engine Type',
            'cams' => 'Cams',
            'valves_cyl' => 'Valves Cyl',
            'compression' => 'Compression',
            'bore' => 'Bore',
            'stroke' => 'Stroke',
            'capacity_cc' => 'Capacity Cc',
            'power_at_revs' => 'Power At Revs',
            'torque' => 'Torque',
            'induction' => 'Induction',
            'ignition' => 'Ignition',
            'fuel_system' => 'Fuel System',
            'chassis_type' => 'Chassis Type',
            'body_type' => 'Body Type',
            'designer' => 'Designer',
            'front_suspension' => 'Front Suspension',
            'rear_suspension' => 'Rear Suspension',
            'shock_absorbers' => 'Shock Absorbers',
            'engine_position' => 'Engine Position',
            'wheelbase_mm' => 'Wheelbase Mm',
            'front_track_mm' => 'Front Track Mm',
            'rear_track_mm' => 'Rear Track Mm',
            'weight_kg' => 'Weight Kg',
            'drive' => 'Drive',
            'number_of_gears' => 'Number Of Gears',
            'gearbox' => 'Gearbox',
            'fuel_tank_size_litres' => 'Fuel Tank Size Litres',
            'brakes' => 'Brakes',
            'front_brake_type' => 'Front Brake Type',
            'rear_brake_type' => 'Rear Brake Type',
            'front_rims' => 'Front Rims',
            'rear_rims' => 'Rear Rims',
            'tyres' => 'Tyres',
            'front_tyres' => 'Front Tyres',
            'rear_tyres' => 'Rear Tyres',
            'maximum_speed_kph' => 'Maximum Speed Kph',
            'error' => 'Error',
            'created' => 'Created',
            'modified' => 'Modified',
            'deleted' => 'Deleted',
            'deleted_date' => 'Deleted Date',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('content_id', $this->content_id);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('tuner', $this->tuner, true);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('year', $this->year, true);
        $criteria->compare('engine', $this->engine, true);
        $criteria->compare('engine_type', $this->engine_type, true);
        $criteria->compare('cams', $this->cams, true);
        $criteria->compare('valves_cyl', $this->valves_cyl, true);
        $criteria->compare('compression', $this->compression, true);
        $criteria->compare('bore', $this->bore, true);
        $criteria->compare('stroke', $this->stroke, true);
        $criteria->compare('capacity_cc', $this->capacity_cc, true);
        $criteria->compare('power_at_revs', $this->power_at_revs, true);
        $criteria->compare('torque', $this->torque, true);
        $criteria->compare('induction', $this->induction, true);
        $criteria->compare('ignition', $this->ignition, true);
        $criteria->compare('fuel_system', $this->fuel_system, true);
        $criteria->compare('chassis_type', $this->chassis_type, true);
        $criteria->compare('body_type', $this->body_type, true);
        $criteria->compare('designer', $this->designer, true);
        $criteria->compare('front_suspension', $this->front_suspension, true);
        $criteria->compare('rear_suspension', $this->rear_suspension, true);
        $criteria->compare('shock_absorbers', $this->shock_absorbers, true);
        $criteria->compare('engine_position', $this->engine_position, true);
        $criteria->compare('wheelbase_mm', $this->wheelbase_mm, true);
        $criteria->compare('front_track_mm', $this->front_track_mm, true);
        $criteria->compare('rear_track_mm', $this->rear_track_mm, true);
        $criteria->compare('weight_kg', $this->weight_kg, true);
        $criteria->compare('drive', $this->drive, true);
        $criteria->compare('number_of_gears', $this->number_of_gears, true);
        $criteria->compare('gearbox', $this->gearbox, true);
        $criteria->compare('fuel_tank_size_litres', $this->fuel_tank_size_litres, true);
        $criteria->compare('brakes', $this->brakes, true);
        $criteria->compare('front_brake_type', $this->front_brake_type, true);
        $criteria->compare('rear_brake_type', $this->rear_brake_type, true);
        $criteria->compare('front_rims', $this->front_rims, true);
        $criteria->compare('rear_rims', $this->rear_rims, true);
        $criteria->compare('tyres', $this->tyres, true);
        $criteria->compare('front_tyres', $this->front_tyres, true);
        $criteria->compare('rear_tyres', $this->rear_tyres, true);
        $criteria->compare('maximum_speed_kph', $this->maximum_speed_kph, true);
        $criteria->compare('error', $this->error);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('deleted_date', $this->deleted_date, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * @name readContent
     * @abstract reads the contenttable and converts them into tType
     */
    public function readContent() {
        $list = Content::model()->findAll('sectionid=2 and catid=13'); // sources/AZRacingCars
        //
        echo 'Articles:' . count($list) . "\n";
        foreach ($list as $article) {
            echo 'article:' . $article->title . "\n";

            $text = $article->introtext . $article->fulltext;
            $cnt = 0;
            $lines = explode(chr(13), $text);

            // booleans
            $ttype = false;
            if (count($lines) > 1) {
                try {
                    foreach ($lines as $line) {

                        if (strpos(strtolower($line), '<h1>') > 0) { //.$article->title.'</h1>'
                            $ttype = true;
                        } else if ($ttype && strpos(strtolower($line), '<table border="1">') > 0) {
                            $typeTable = $line;
                        } else if ($ttype && strpos(strtolower($line), '</table>') > 0) {
                            // end of season table
                            $typeTable .= $line;
                            $ttype = false;
                            $data = $this->table2array($typeTable);

                            $this->addType($article, $data);
                        } else if ($ttype) {
                            $typeTable .= $line;
                        }
                    } // foreach
                } catch (Exception $ex) {
                    echo $ex->getMessage() . "\n";
                    echo 'project:' . $project . "\n";
                }
            } // count($lines)
        } // foreach list

        echo 'updated : ' . $this->updated . "\n";
        echo 'added   : ' . $this->added . "\n";
        echo '******** end of readContent() **********' . "\n";
    }

    /**
     * Enter description here ...
     * @param $table
     * @param $debug
     */
    private function table2array($table, $debug = false) {

        if ($debug) {
            debug($table);
        }

        $tbl = new TableExtractor();
        $tbl->source = $table; // Set the HTML Document
        $tbl->htmlEntitiesDecode = true;
        $tbl->returnRaw = true;
        $data = $tbl->extractTable(); // The array

        return $data;
    }

    private function addType($article, $type) {
        //print_r($type);
        $ttype = Ttype::model()->find('content_id =:content_id and name=:name', array('content_id' => $article->id, 'name' => $article->title));
        if (empty($ttype->id)) {
            $ttype = new Ttype();
            $ttype->content_id = $article->id;
            $ttype->name = $article->title;
            $this->added++;
        } else {
            $this->updated++;
        }
        foreach ($type as $row) {
            $element = str_replace(array(' ', '/', '(', ')'), array('_', '_', '', ''), strtolower($row[1]));
            //echo 'key: '.$element.' => '.$row[2]."\n";
            $ttype->$element = $row[2];
        }
        return $ttype->save();
    }

    public function behaviors() {
        return array(
            'AutoTimestampBehavior' => array('class' => 'application.components.AutoTimestampBehavior'),
            'ERememberFiltersBehavior' => array(
                'class' => 'application.components.ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
        );
    }

    public function convertTtype() {
        $type = Type::model()->with('make')->find('concat(make.name," ",t.name)=:name', array('name' => $this->name));
        if (!empty($type->id)) {
            $this->type_id = $type->id;
            $this->make_id = $type->make_id;
            $this->save();
        } else {

            $vehicle = explode(' ', $this->name);
            $search = '';
            $cnt = count($vehicle);
            print_r($vehicle);
            for ($i = 1; $i <= $cnt; $i++) {
                $search .= ' ' . $vehicle[$i - 1];
                echo 'search:' . $search;
                $type = Type::model()->with('make')->find('concat(make.name," ",t.name)=:name', array('name' => trim($search)));
                if (!empty($type->id)) {
                    $this->type_id = $type->id;
                    $this->make_id = $type->make_id;
                    $this->save();
                } else {
                    $make = Make::model()->find('name=:name', array('name' => trim($search)));
                    if (!empty($make->id)) {
                        $this->make_id = $make->id;
                        $this->save();
                    }
                }
            }
        }

        return true;
    }

}