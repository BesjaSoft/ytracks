<?php

/**
 * This is the model class for table "{{content}}".
 *
 * The followings are the available columns in table '{{content}}':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $title_alias
 * @property string $introtext
 * @property string $fulltext
 * @property integer $state
 * @property integer $sectionid
 * @property integer $mask
 * @property integer $catid
 * @property string $created
 * @property integer $created_by
 * @property string $created_by_alias
 * @property string $modified
 * @property integer $modified_by
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $publish_up
 * @property string $publish_down
 * @property string $images
 * @property string $urls
 * @property string $attribs
 * @property integer $version
 * @property integer $parentid
 * @property integer $ordering
 * @property string $metakey
 * @property string $metadesc
 * @property integer $access
 * @property integer $hits
 * @property string $metadata
 * @property integer $deleted
 */
class Content extends BaseModel
{
    //private $round = 0;
    //private $found = 0;
    //private $added = 0;
    //private $results = 0;
    //private $subround = 0;
    /**
     * Returns the static model of the specified AR class.
     * @return Content the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{content}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fulltext, created', 'required'),
            array('state, sectionid, mask, catid, created_by, modified_by, checked_out, version, parentid, ordering, access, hits, deleted', 'numerical', 'integerOnly'=>true),
            array('title, alias, title_alias, created_by_alias', 'length', 'max'=>255),
            array('introtext, modified, checked_out_time, publish_up, publish_down, images, urls, attribs, metakey, metadesc, metadata', 'safe'),
            // foreign key checks:
            array('catid', 'exist','attributeName' => 'id', 'className' => 'Category'),
            array('sectionid', 'exist','attributeName' => 'id', 'className' => 'Section'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, alias, title_alias, introtext, fulltext, state, sectionid, mask, catid, created, created_by, created_by_alias, modified, modified_by, checked_out, checked_out_time, publish_up, publish_down, images, urls, attribs, version, parentid, ordering, metakey, metadesc, access, hits, metadata, deleted', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'catid'),
            'section' => array(self::BELONGS_TO, 'Section' , 'sectionid'),
            'tindividual' => array(self::HAS_MANY, 'Tindividual', 'content_id'),
            'individual' => array(self::HAS_MANY, 'Individual', 'content_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'title_alias' => 'Title Alias',
            'introtext' => 'Introtext',
            'fulltext' => 'Fulltext',
            'state' => 'State',
            'sectionid' => 'Sectionid',
            'mask' => 'Mask',
            'catid' => 'Catid',
            'created' => 'Created',
            'created_by' => 'Created By',
            'created_by_alias' => 'Created By Alias',
            'modified' => 'Modified',
            'modified_by' => 'Modified By',
            'checked_out' => 'Checked Out',
            'checked_out_time' => 'Checked Out Time',
            'publish_up' => 'Publish Up',
            'publish_down' => 'Publish Down',
            'images' => 'Images',
            'urls' => 'Urls',
            'attribs' => 'Attribs',
            'version' => 'Version',
            'parentid' => 'Parentid',
            'ordering' => 'Ordering',
            'metakey' => 'Metakey',
            'metadesc' => 'Metadesc',
            'access' => 'Access',
            'hits' => 'Hits',
            'metadata' => 'Metadata',
            'deleted' => 'Deleted',
        );
    }

    public function behaviors()
    {
        return array(
            'AutoTimestampBehavior' => array('class' => 'application.components.AutoTimestampBehavior'),
            'SlugBehavior' => array('class' => 'application.models.behaviours.SlugBehavior',
                'slug_col' => 'title_alias',
                'title_col' => 'title',
                'overwrite' => false //, 'max_slug_chars' => 125
            ),
           'ERememberFiltersBehavior' => array('class' => 'application.components.ERememberFiltersBehavior',
               'defaults'=>array(),           /* optional line */
               'defaultStickOnClear'=>false   /* optional line */
           ),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title,true);
        $criteria->compare('alias', $this->alias,true);
        $criteria->compare('title_alias', $this->title_alias,true);
        $criteria->compare('introtext', $this->introtext,true);
        $criteria->compare('fulltext', $this->fulltext,true);
        $criteria->compare('state', $this->state);
        $criteria->compare('sectionid', $this->sectionid);
        $criteria->compare('mask', $this->mask);
        $criteria->compare('catid', $this->catid);
        $criteria->compare('created', $this->created,true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_by_alias', $this->created_by_alias,true);
        $criteria->compare('modified', $this->modified,true);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('checked_out', $this->checked_out);
        $criteria->compare('checked_out_time', $this->checked_out_time,true);
        $criteria->compare('publish_up', $this->publish_up,true);
        $criteria->compare('publish_down', $this->publish_down,true);
        $criteria->compare('images', $this->images,true);
        $criteria->compare('urls', $this->urls,true);
        $criteria->compare('attribs', $this->attribs,true);
        $criteria->compare('version', $this->version);
        $criteria->compare('parentid', $this->parentid);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('metakey', $this->metakey,true);
        $criteria->compare('metadesc', $this->metadesc,true);
        $criteria->compare('access', $this->access);
        $criteria->compare('hits', $this->hits);
        $criteria->compare('metadata', $this->metadata,true);
        $criteria->compare('deleted', $this->deleted);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * @param $file - the filename to read
     * @param $sectionId - the content section the files content is stored to
     * @param $catId - the category the files content is stored to
     */
    public function readfile($file, $sectionId, $catId)
    {

        if (file_exists($file)) {
            $config = array('output-xhtml' => true,
                'wrap'=> 200
            );
            try {
                $tidy = new Tidy();
                $tidy->parseFile($file, $config);
                $tidy->cleanRepair();
                $text = $tidy->Body()->value;
                //$text = file_get_contents($file);
                if (!empty($text)) {
                    $title = substr($file, strrpos($file,'/')+1);
                    if ($catId == 13) { // azracingcars
                        $sh1 = strpos($text, '<h1>', strpos($text, '<h1>') + 1);
                        $eh1 = strpos($text, '</h1>', strpos($text, '</h1>') + 1);
                        $title = trim(substr($text, $sh1+4, ($eh1 - $sh1 - 4)));
                    }

                    // remove some unwanted tags:
                    $text = str_replace('<body>', '', $text);
                    $text = str_replace('</body>', '', $text);
                    $text = str_replace('<img src="../www.toplist.cz/Wc237fae3e4f50.htm" width="1" height="1" border="0" />', '', $text);
                    $text = str_replace('<!-- IClista -->', '', $text);
                    $text = str_replace('<!-- /IClista -->', '', $text);
                    // remove the scripts:
                    $text = $this->removeTags($text, 'script');
                    $text = $this->removeTags($text, 'noscript');
                    // encode the text to utf8
                    //$text = utf8_encode($text);
                    $content = Content::model()->find(
                        'title=:title and sectionid=:section and catid=:cat',
                        array('title' => $title,
                            'section' => $sectionId,
                            'cat' => $catId
                        )
                    );
                    if (empty($content->id)) {
                        echo 'Title not found : '.$title."\n";
                        $content = new Content();
                    }
                    $content->title = $title;
                    $content->introtext = '';
                    $content->fulltext  = trim($text);
                    $content->sectionid = $sectionId;
                    $content->catid = $catId;
                    $content->state = 1;
                    $content->created_by_alias = 'Administrator';
                    if (!$content->save()) {
                        echo 'file '.$title.', invalid fields'."\n";
                    }
                    unset($content);
                } else {
                    echo 'file '.$file.' no content."\n';
                }
            } catch (Exception $ex) {
                echo 'Exception op file '.$file.':'.$ex->getMessage()."\n";
            }
        } else {
            echo 'File '.$file.' bestaat niet!';
        }
    }

    // private functions
    private function removeTags($text, $tag)
    {
        $loop = true;
        while($loop) {
            $startPos = strpos($text, '<'.$tag);
            $endPos = strpos($text, '</'.$tag.'>');
            if (!$startPos && !$endPos) {
                $loop = false;
            } else {
                $text = substr($text,0, $startPos).substr($text, $endPos+strlen('</'.$tag.'>'),strlen($text));
            }
        }
        return $text;
    }
}