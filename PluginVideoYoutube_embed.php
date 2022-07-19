<?php
class PluginVideoYoutube_embed{
  private $attribute = null;
  function __construct()
  {
    /**
     * 
     */
    wfPlugin::includeonce('wf/array');
    wfPlugin::includeonce('wf/yml');
    /**
     * 
     */
    $this->attribute = new PluginWfArray(array(
      'title' => 'Video',
      'src' => '',
      'allowfullscreen' => '',
      'allow' => 'autoplay; fullscreen',
      'name' => '',
      'id' => '',
      'class' => 'embed-responsive-item'
    ));
  }
  public function widget_embed($data){
    $data = new PluginWfArray($data);
    $value = $data->get('data/value');
    if(!$value){
      /**
       * Empty.
       */
      throw new Exception(__CLASS__.' says: Param value is empty!');
    }elseif(strstr($value, '<iframe')){
      /**
       * Embed html.
       */
       echo $value;
    }elseif(strstr($value, 'youtu.be')){
      /**
       * Link.
       */
      $id = substr($value, strpos($value, 'youtu.be')+9);
      $element = $this->get_element($id);
      wfDocument::renderElement(array($element->get()));
    }else{
      /**
       * Id.
       */
      $id = $value;
      $element = $this->get_element($id);
      wfDocument::renderElement(array($element->get()));
    }
  }
  private function get_element($id){
    $element = new PluginWfYml(__DIR__.'/element/widget_embed.yml');
    $this->attribute->set('id', $id);
    $this->attribute->set('name', $id);
    $this->attribute->set('src', 'https://www.youtube.com/embed/'.$id.'?autoplay=0&amp;enablejsapi=1&amp;wmode=opaque');
    $element->setByTag($this->attribute->get());
    return $element;
  }
}
