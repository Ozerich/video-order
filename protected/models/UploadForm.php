<?
class UploadForm extends CFormModel
{
    public $image;

    public function rules()
    {
        return array(
            array('image', 'file', 'types' => 'jpg,jpeg,gif,png', 'maxSize' => 10 * 1024 * 1024, 'on' => 'image'),
            array('image', 'file', 'types' => 'mp3', 'maxSize' => 100 * 1024 * 1024, 'on' => 'music'),
        );
    }
}

?>