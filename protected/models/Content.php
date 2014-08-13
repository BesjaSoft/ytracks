<?php

/**
 * This is the model class for table "{{content}}".
 *
 * The followings are the available columns in table '{{content}}':
 * @property string $id
 * @property string $asset_id
 * @property string $title
 * @property string $alias
 * @property string $introtext
 * @property string $fulltext
 * @property integer $state
 * @property string $catid
 * @property string $created
 * @property string $created_by
 * @property string $created_by_alias
 * @property string $modified
 * @property string $modified_by
 * @property string $checked_out
 * @property string $checked_out_time
 * @property string $publish_up
 * @property string $publish_down
 * @property string $images
 * @property string $urls
 * @property string $attribs
 * @property string $version
 * @property integer $ordering
 * @property string $metakey
 * @property string $metadesc
 * @property string $access
 * @property string $hits
 * @property string $metadata
 * @property integer $featured
 * @property string $language
 * @property string $xreference
 * @property integer $old_id
 *
 * The followings are the available model relations:
 * @property TracksTindividuals[] $tracksTindividuals
 * @property TracksTresults[] $tracksTresults
 * @property TracksTtypes[] $tracksTtypes
 */
class Content extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{content}}';
    }

    public function behaviors() {
        return array(
            'AutoTimestampBehavior' => array('class' => 'application.components.AutoTimestampBehavior'),
            'SlugBehavior' => array('class' => 'application.models.behaviours.SlugBehavior',
                'slug_col' => 'alias',
                'title_col' => 'title',
                'overwrite' => false //, 'max_slug_chars' => 125
            ),
            'ERememberFiltersBehavior' => array('class' => 'application.components.ERememberFiltersBehavior',
                'defaults' => array(), /* optional line */
                'defaultStickOnClear' => false /* optional line */
            ),
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('introtext, fulltext, images, urls, attribs, metakey, metadesc, metadata, language, xreference', 'required'),
            array('fulltext, images, urls, attribs, language', 'required'),
            array('state, ordering, featured, old_id', 'numerical', 'integerOnly' => true),
            array('asset_id, catid, created_by, modified_by, checked_out, version, access, hits', 'length', 'max' => 10),
            array('title, alias, created_by_alias', 'length', 'max' => 255),
            array('attribs', 'length', 'max' => 5120),
            array('language', 'length', 'max' => 7),
            array('xreference', 'length', 'max' => 50),
            array('created, modified, checked_out_time, publish_up, publish_down', 'safe'),
            // multicolumn unique validator
            array('title+catid', 'uniqueMultiColumnValidator'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, asset_id, title, alias, introtext, fulltext, state, catid, created, created_by, created_by_alias, modified, modified_by, checked_out, checked_out_time, publish_up, publish_down, images, urls, attribs, version, ordering, metakey, metadesc, access, hits, metadata, featured, language, xreference, old_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'catid'),
            'tindividual' => array(self::HAS_MANY, 'Tindividual', 'content_id'),
            'individual' => array(self::HAS_MANY, 'Individual', 'content_id'),
            'tracksTindividuals' => array(self::HAS_MANY, 'TracksTindividuals', 'content_id'),
            'tracksTresults' => array(self::HAS_MANY, 'TracksTresults', 'content_id'),
            'tracksTtypes' => array(self::HAS_MANY, 'TracksTtypes', 'content_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'asset_id' => 'Asset',
            'title' => 'Title',
            'alias' => 'Alias',
            'introtext' => 'Introtext',
            'fulltext' => 'Fulltext',
            'state' => 'State',
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
            'ordering' => 'Ordering',
            'metakey' => 'Metakey',
            'metadesc' => 'Metadesc',
            'access' => 'Access',
            'hits' => 'Hits',
            'metadata' => 'Metadata',
            'featured' => 'Featured',
            'language' => 'Language',
            'xreference' => 'Xreference',
            'old_id' => 'Old',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('asset_id', $this->asset_id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('introtext', $this->introtext, true);
        $criteria->compare('fulltext', $this->fulltext, true);
        $criteria->compare('state', $this->state);
        $criteria->compare('catid', $this->catid, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('created_by', $this->created_by, true);
        $criteria->compare('created_by_alias', $this->created_by_alias, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('modified_by', $this->modified_by, true);
        $criteria->compare('checked_out', $this->checked_out, true);
        $criteria->compare('checked_out_time', $this->checked_out_time, true);
        $criteria->compare('publish_up', $this->publish_up, true);
        $criteria->compare('publish_down', $this->publish_down, true);
        $criteria->compare('images', $this->images, true);
        $criteria->compare('urls', $this->urls, true);
        $criteria->compare('attribs', $this->attribs, true);
        $criteria->compare('version', $this->version, true);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('metakey', $this->metakey, true);
        $criteria->compare('metadesc', $this->metadesc, true);
        $criteria->compare('access', $this->access, true);
        $criteria->compare('hits', $this->hits, true);
        $criteria->compare('metadata', $this->metadata, true);
        $criteria->compare('featured', $this->featured);
        $criteria->compare('language', $this->language, true);
        $criteria->compare('xreference', $this->xreference, true);
        $criteria->compare('old_id', $this->old_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Content the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function readfile($file, $catId) {

        echo "- file " . $file . "\n";
        if (file_exists($file)) {
            $config = array('output-xhtml' => true,
                'wrap' => 200
            );
            try {
                $tidy = new Tidy();
                $tidy->parseFile($file, $config);
                $tidy->cleanRepair();
                $text = $tidy->Body()->value;
                //$text = file_get_contents($file);
                if (!empty($text)) {
                    $title = substr($file, strrpos($file, '/') + 1);
                    if ($catId == 24) { // azracingcars
                        $sh1 = strpos($text, '<h1>', strpos($text, '<h1>') + 1);
                        $eh1 = strpos($text, '</h1>', strpos($text, '</h1>') + 1);
                        $title = trim(substr($text, $sh1 + 4, ($eh1 - $sh1 - 4)));
                    }

                    // remove some unwanted tags:
                    $text = str_replace('<body>', '', $text);
                    $text = str_replace('</body>', '', $text);
                    $text = str_replace('<img src="../www.toplist.cz/Wc237fae3e4f50.htm" width="1" height="1" border="0" />', '', $text);
                    $text = str_replace('<!-- IClista -->', '', $text);
                    $text = str_replace('<!-- /IClista -->', '', $text);
                    // remove the scripts:
                    $text = self::removeTags($text, 'script');
                    $text = self::removeTags($text, 'noscript');
                    // encode the text to utf8
                    //$text = utf8_encode($text);
                    $content = Content::model()->find('title=:title and catid=:cat', array('title' => $title, 'cat' => $catId));
                    if (empty($content->id)) {
                        echo 'Title not found : ' . $title . "\n";
                        $content = new Content();
                    }
                    $content->title = $title;
                    $content->introtext = ' ';
                    $content->fulltext = trim($text);
                    $content->catid = $catId;
                    $content->state = 1;
                    $content->created_by_alias = 'Administrator';
                    $content->access = 5; // guest
                    $content->language = '*'; // all languages
                    $content->images = '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}';
                    $content->urls = '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}';
                    $content->attribs = '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}';
                    $content->metakey = '{"metakey":""}';
                    $content->metadesc = '{"metadesc":""}';
                    $content->metadata = '{"robots":"","author":"","rights":"","xreference":""}';
                    if (!$content->save()) {
                        echo 'file ' . $title . ', invalid fields' . "\n";
                        print_r($content->getErrors());
                        die;
                    }
                    unset($content);
                } else {
                    echo 'file ' . $file . ' no content."\n';
                }
            } catch (Exception $ex) {
                echo 'Exception op file ' . $file . ':' . $ex->getMessage() . "\n";
            }
        } else {
            echo 'File ' . $file . ' bestaat niet!';
        }
    }

    // private functions:
    private static function removeTags($text, $tag) {
        $loop = true;
        while ($loop) {
            $startPos = strpos($text, '<' . $tag);
            $endPos = strpos($text, '</' . $tag . '>');
            if (!$startPos && !$endPos) {
                $loop = false;
            } else {
                $text = substr($text, 0, $startPos) . substr($text, $endPos + strlen('</' . $tag . '>'), strlen($text));
            }
        }
        return $text;
    }

}
