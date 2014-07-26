<?php
class CustomLinkPager extends CLinkPager {
    
    public $pages;
    public $prevPageLabel = "";
    
    public function run()    
    {        
        $this->setPages($this->pages);
        
        $this->prevPageLabel = CHtml::image(Yii::app()->theme->baseUrl."/images/arrow_left.png", "Previous", array("border" => 0));
        $this->nextPageLabel = CHtml::image(Yii::app()->theme->baseUrl."/images/arrow_right.png", "Next", array("border" => 0));
        //if($this->nextPageLabel === null)
        //{
        
        if($this->nextPageLabel === null){
            $this->nextPageLabel=Yii::t('yii','Next &gt;');
        }
        if($this->prevPageLabel === null){
            $this->prevPageLabel=Yii::t('yii','&lt; Previous');
        }
        if($this->firstPageLabel === null){            
            $this->firstPageLabel=Yii::t('yii','&lt;&lt; First');
        }
        if($this->lastPageLabel === null){
            $this->lastPageLabel=Yii::t('yii','Last &gt;&gt;');
        }
        if($this->header === null){
            $this->header = Yii::t('yii', 'Go to page: ');
        }
        
        $buttons = $this->createPageButtons();
  
        //print_r ($buttons);
        if(empty($buttons)){       
            return;        
        }
        
        
        $this->registerClientScript();        
        
        $htmlOptions=$this->htmlOptions;        
        if(!isset($htmlOptions['id'])){      
            $htmlOptions['id']=$this->getId();
        }        
        if(!isset($htmlOptions['class'])){            
            $htmlOptions['class']='yiiPager'; 
        }       
        //echo $this->header;        
        list($beginPage,$endPage)=$this->getPageRange();        
        
        $currentPage = $this->getCurrentPage(false);        
        if(($prevPage = $currentPage-1) < 0){  
            $prevPage = 0;
        }
//        if(($nextPage = $currentPage-1) < 0){            
//            $nextPage = 0;
//        }//
        
        $pageCount = $this->getPageCount();
        if(($nextPage = $currentPage + 1) >= $pageCount){
            $nextPage = $pageCount-1;
        }
        //echo "page - ".$nextPage.", current - ".$currentPage.", page count - ".$pageCount;
        // previous page link
        echo '<table cellpadding="0" cellspacing="5"><tr><td>';
        echo CHtml::link($this->prevPageLabel, $this->createPageUrl($prevPage),array(/*add other link options here*/));
        echo "</td><td>Lk.</td><td>";
        //echo CHtml::tag('ul',$htmlOptions,implode("\n",$buttons));
        echo CHtml::textField("current", $currentPage + 1, array("id" => "current", "style" => "width: 40px;border: 1px solid #CCCCCC;", "maxlength" => 3));
        echo "</td><td>";
        echo '<span id="totalPagesCount">'.$pageCount."</span>-st";
        echo "</td><td>";
        //next page link
        echo CHtml::link($this->nextPageLabel, $this->createPageUrl($nextPage),array(/*add other link options here*/));
        echo "</td><td></table>";
        //echo $this->footer;
        
       //} 
       
    }
        
    protected function createPageButtons()
    {        
            if(($pageCount = $this->getPageCount()) <= 1){       
                return array();
            }
            list($beginPage,$endPage)=$this->getPageRange();        
            $currentPage=$this->getCurrentPage(false);
            // currentPage is calculated in getPageRange()        
            $buttons=array();        
            // Commented out first / prev page (these added in run())        
            // first page        
            //$buttons[]=$this->createPageButton($this->firstPageLabel,0,self::CSS_FIRST_PAGE,$beginPage<=0,false);        
            // prev page        
            //if(($page = $currentPage-1) < 0){
//                $page = 0;
//            }
//            $buttons[] = $this->createPageButton($this->prevPageLabel, $page,self::CSS_PREVIOUS_PAGE,$currentPage<=0,false);        
//            
            // internal pages        
            for($i = $beginPage; $i <= $endPage; ++$i){
                $buttons[] = $this->createPageButton($i+1,$i,self::CSS_INTERNAL_PAGE,false,$i==$currentPage);
            }
            // Commented out next/last page (these added in run())         
            // next page   
            //if(($page = $currentPage + 1) >= $pageCount-1){
//                $page = $pageCount - 1;
//            }
//            $buttons[] = $this->createPageButton($this->nextPageLabel,$page, self::CSS_NEXT_PAGE,$currentPage>=$pageCount-1,false);        
//            // last page        
            //$buttons[]=$this->createPageButton($this->lastPageLabel,$pageCount-1,self::CSS_LAST_PAGE,$endPage>=$pageCount-1,false);        
            return $buttons;
        }
}