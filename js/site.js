ko.bindingHandlers.gallery = {
    update:function (element, valueAccessor) {

    }
};

var Video = {};

Video.Models = {};

Video.Models.Design = function () {

    var _id;

    this.setID = function (_value) {
        _id = +_value;
    };

    this.getID = function () {
        return _id;
    };


    // Название ролика
    var _name;

    this.setName = function (_value) {
        _name = _value;
    };

    this.getName = function () {
        return _name;
    };


    // Ссылка на картинку-превью
    var _image;

    this.setImage = function (_value) {
        _image = _value;
    };

    this.getImage = function () {
        return _image;
    };


    // Ссылка на видео
    var _video;

    this.setVideo = function (_value) {
        _video = _value;
    };
    this.getVideo = function () {
        return _video;
    };


};

Video.Models.Voice = function () {

    var _id;

    this.setID = function (_value) {
        _id = +_value;
    };

    this.getID = function () {
        return _id;
    };

    // Название
    var _name;

    this.setName = function (_value) {
        _name = _value;
    };

    this.getName = function () {
        return _name;
    };


    // Тип голоса: 1 - мужской 0 - женский
    var _sex;

    this.setSex = function (_value) {
        _sex = _value;
    };

    this.getSex = function () {
        return _sex;
    };


    var _file;

    this.setFile = function (_value) {
        _file = _value;
    };

    this.getFile = function () {
        return _file;
    };


};

Video.Models.Music = function () {

    var _id;

    this.setID = function (_value) {
        _id = +_value;
    };

    this.getID = function () {
        return _id;
    };

    // Название
    var _name;

    this.setName = function (_value) {
        _name = _value;
    };

    this.getName = function () {
        return _name;
    };


    var _file;

    this.setFile = function (_value) {
        _file = _value;
    };

    this.getFile = function () {
        return _file;
    };

};

Video.Models.Frame = function () {


    this.loader = ko.observable(false);
    this.loaded = ko.observable(false);
    this.image = ko.observable('');
    this.preview_image = ko.observable('');

    var _id = Math.round(Math.random() * 1000000);

    this.getID = function () {
        return _id;
    };

    var _frame_text;

    this.setFrameText = function (_value) {
        _frame_text = _value;
    };
    this.getFrameText = function () {
        return _frame_text;
    };


    var _speaker_text;

    this.setSpeakerText = function (_value) {
        _speaker_text = _value;
    };
    this.getSpeakerText = function () {
        return _speaker_text;
    };


    var _image = '';

    this.setImage = function (_value) {
        _image = _value;
        this.image(_value);
    };
    this.getImage = function (_value) {
        return _image;
    };


    var _preview_image = '';

    this.setPreviewImage = function (_value) {
        _preview_image = _value;
        this.preview_image(_value);
    };
    this.getPreviewImage = function (_value) {
        return _preview_image;
    };

};


Video._ViewModel = function () {
    var that = this;

    this.allowedExts = ['jpg', 'png', 'bmp', 'gif'];

    this.sessionId = ko.observable();

    this.active_tab = ko.observable(2);

    this.changeActiveTab = function (ind) {
        this.active_tab(ind);
    };


    this.loader = ko.observable(true);

    this.designs = ko.observableArray();
    this.voices = ko.observableArray();
    this.music = ko.observableArray();

    this.menVoices = ko.computed(function () {
        return ko.utils.arrayFilter(this.voices(), function (item) {
            return item.getSex() == 1;
        });
    }, this);

    this.womanVoices = ko.computed(function () {
        return ko.utils.arrayFilter(this.voices(), function (item) {
            return item.getSex() == 0;
        });
    }, this);


    this.addDesign = function (_id, _name, _image, _video) {

        var design = new Video.Models.Design;

        design.setID(_id);
        design.setName(_name);
        design.setImage(_image);
        design.setVideo(_video);

        this.designs.push(design);
    };

    this.addVoice = function (_id, _name, _sex, _file) {

        var voice = new Video.Models.Voice;

        voice.setID(_id);
        voice.setName(_name);
        voice.setSex(_sex);
        voice.setFile(_file);

        this.voices.push(voice);
    };

    this.addMusic = function (_id, _name, _file) {
        var music = new Video.Models.Music;

        music.setID(_id);
        music.setName(_name);
        music.setFile(_file);

        this.music.push(music);
    };

    this.selectedMusic = ko.observable(null);
    this.selectMusic = function (music) {
        that.selectedMusic(music);
    };

    this.selectedDesign = ko.observable(null);
    this.selectDesign = function (design) {
        that.selectedDesign(design);
    };

    this.selectedVoice = ko.observable(null);
    this.selectVoice = function (voice) {
        that.selectedVoice(voice);
    };


    jQuery.getJSON('/load', function (data) {

        that.sessionId(data.Session);

        for (var i in data.Designs) {
            var design = data.Designs[i];

            that.addDesign(design.ID, design.Name, design.Image, design.Video);
        }

        for (var i in data.Voices) {
            var voice = data.Voices[i];

            that.addVoice(voice.ID, voice.Name, voice.Sex, voice.File);
        }

        for (var i in data.Music) {
            var music = data.Music[i];

            that.addMusic(music.ID, music.Name, music.File);
        }

        $('.gallery').galleryScroll();
        initCastomForms();
        initAll();
        $('.demo .iframe').fancybox({"type":"iframe"});

        //  basicMP3Player = new BasicMP3Player();

        that.loader(false);
    });


    // STEP 2


    this.frames = ko.observableArray();

    this.addFrame = function () {
        var frame = new Video.Models.Frame;

        frame.setFrameText('');
        frame.setSpeakerText('');
        frame.setImage('');

        this.frames.push(frame);
    };

    this.findFrame = function (id) {
        for (var i = 0; i < that.frames().length; i++)
            if (that.frames()[i].getID() == id) {
                return that.frames()[i];
            }
        return null;
    };

    this.deleteFrame = function (frame) {
        that.frames.remove(frame);
    };

    this.deletePhoto = function (frame) {
        frame.loaded(false);
        frame.setPreviewImage('');
        frame.setImage('');
    };

    for (var i = 1; i <= 1; i++) {
        this.addFrame();
    }


    this.submit = function () {
        alert('submited');
    }
};

Video.ViewModel = new Video._ViewModel();


Video.loadFile = function (event) {

    var value = $(event.target).val();


    if (value) {
        if (value.indexOf('.') === -1 || jQuery.inArray(value.substr(value.lastIndexOf('.') + 1).toLowerCase(), Video.ViewModel.allowedExts) == -1) {
            alert('Запрещенный формат файла!');
            return;
        }
    }


    var id = $(event.target).attr('id').substr(5);
    var frame = Video.ViewModel.findFrame(id);
    frame.loader(true);

    $.ajaxFileUpload({
        url:'/upload',
        secureuri:false,
        fileElementId:$(event.target).parents('.col1').find('input[type=file]').attr('id'),
        dataType:'json',
        success:function (data, status) {
            if (typeof(data.error) != 'undefined') {
                if (data.error != '') {
                    alert(data.error);
                } else {

                    frame.loader(false);
                    frame.loaded(true);
                    frame.setImage(data.image);
                    frame.setPreviewImage(data.preview_image);

                    $(event.target).parents('.col1').find('.visual a').fancybox();

                }
            }
        },
        error:function (data, status, e) {
            alert(e);
        }
    });


};

$(function () {

    ko.applyBindings(Video.ViewModel);

    $(".help").simpletip({
        onBeforeShow: function(){
            var text=this.getParent().find('img').attr('alt');
            this.getTooltip().html(text);
        },
        content: 'My Simpletip'
    });

    soundManager.setup({
        useFlashBlock: false,
        url: '/js/swf/',
    });

});