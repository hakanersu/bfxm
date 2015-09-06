<?php
namespace Xuma\Bfxm;

class Builder
{
    public $json = array();

    public function __construct()
    {
        $this->json = array("bfxm"=>array("version"=>1));
    }

    /**
     *  Play specific file.
     *
     * @param $url
     * @return $this
     */
    public function play($url)
    {
        $this->add(array("action"=>"play","args"=>array("url"=>$url)));

        return $this;
    }

    /**
     * Request input from user.
     *
     * @param $array
     * @return $this
     */
    public function gather($array)
    {
        $this->add(array(
            "action"=>"gather",
            "args"=>$array
        ));

        return $this;
    }

    /**
     * Hangup call.
     *
     * @return $this
     */
    public function hangup()
    {
        $this->add(array(
            "action"=>"hangup"
        ));

        return $this;
    }

    /**
     * Reject the call.
     *
     * @return $this
     */
    public function reject()
    {
        $this->add(array(
            "action"=>"reject"
        ));

        return $this;
    }
    
    /**
     * Continue the next process
     *
     * @return $this
     */
    public function continueseq()
    {
        $this->add(array(
            "action"=>"continue"
        ));
        return $this;
    }

    /**
     * Set caller name for call.
     *
     * @param $name
     * @return $this
     */
    public function set_caller($name)
    {
        $this->add(array(
            "action"=>"set_caller_name",
            "args"=>array(
                "caller_name"=>$name
            )

        ));

        return $this;
    }

    /**
     * Read specific text.
     *
     * @param $lang
     * @param $text
     * @return $this
     */
    public function say($lang,$text)
    {
        $this->add(array(
            "action"=>"say",
            "args"=>array(
                "lang"=>$lang,
                "text"=>$text
            )
        ));

        return $this;
    }

    /**
     * Dial or redirect a number.
     *
     * @param $num
     * @return $this
     */
    public function dial($num)
    {
        $this->add(array(
            "action"=>"dial",
            "args"=>array(
                "destination"=>$num
            )
        ));

        return $this;
    }

    /**
     * Build json for Bulutfonxm
     *
     * @param bool $build
     * @return bool|string
     */
    public function build($build=false)
    {
        if($build){
            header('Content-Type: application/json');
            echo json_encode($this->json);
            return true;
        }

        return json_encode($this->json);
    }

    private function add($array)
    {
        if(isset($this->json["seq"]))
        {
            array_push($this->json["seq"],$array);
            return;
        }

        $this->json =  array_merge($this->json,array("seq"=>array($array)));
    }
}
