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

    this.speaker_text = ko.observable('');
    this.text = ko.observable('');


    function wordsCount(text) {
        var res = text.match(/[a-zа-я]{1,}(-[a-zа-я]{1,})?/ig);
        return res ? res.length : 0;
    }

    this.words_count = ko.computed(function () {
        return wordsCount(this.text());
    }, this);

    this.speaker_words_count = ko.computed(function () {
        return wordsCount(this.speaker_text());
    }, this);


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

    this.allowedImageExts = ['jpg', 'png', 'bmp', 'gif'];
    this.allowedMusicExts = ['mp3'];

    this.sessionId = ko.observable();

    this.active_tab = ko.observable(2);

    this.changeActiveTab = function (ind) {
        this.active_tab(ind);
    };


    this.loader = ko.observable(true);
    this.file_loader = ko.observable(false);

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


    this.custom_file = ko.observable('');
    this.custom_file_realname = ko.observable('');
    this.selectedMusic = ko.observable(null);
    this.selectMusic = function (music) {
        that.custom_file('');
        that.custom_file_realname('');
        that.selectedMusic(that.selectedMusic() == null || that.selectedMusic().getID() != music.getID() ? music : null);

    };

    this.musicFile = ko.computed(function () {

        if (this.selectedMusic() !== null)
            return {
                real:this.selectedMusic().getName(),
                server:this.selectedMusic().getFile()
            };

        if (this.custom_file())
            return {
                real:this.custom_file_realname(),
                server:this.custom_file()
            };

        return null;
    }, this);

    this.selectedDesign = ko.observable(null);
    this.selectDesign = function (design) {
        that.selectedDesign(that.selectedDesign() == null || that.selectedDesign().getID() != design.getID() ? design : null);
    };

    this.selectedVoice = ko.observable(null);
    this.selectVoice = function (voice) {
        that.selectedVoice(that.selectedVoice() == null || that.selectedVoice().getID() != voice.getID() ? voice : null);
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

        basicMP3Player = new BasicMP3Player();

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

    this.words_count = ko.computed(function () {
        var res = 0;
        for (var i in this.frames()) {
            res += this.frames()[i].words_count();
        }
        return res;
    }, this);

    this.price = ko.computed(function () {
        return 3000 + this.words_count() * 20;
    }, this);

    this.days = ko.computed(function () {
        var words_count = this.words_count();
        return words_count <= 200 ? "1 день" : parseInt((words_count / 200)) + 1 + " дней";
    }, this);

    this.time = ko.computed(function () {
        var time = this.words_count() * 500;
        var ms = parseInt(time % 1000), s = parseInt(time / 1000), m = parseInt(s / 60), h = parseInt(m / 60);
        (s %= 60) < 10 ? s = '0' + s : s;
        (m %= 60) < 10 ? m = '0' + m : m;
        (h) < 10 ? h = '0' + h : h;
        return m + "мин:" + s + "сек.";
    }, this);


    this.go_to_final = function () {
        that.active_tab(4);
    };

    this.back_to_edit = function () {
        that.active_tab(3);
    };

    this.submit = function () {
        that.active_tab(5);
    };

    this.value = ko.observable();
    this.email = ko.observable();
    this.information = ko.observable();

    this.moveFrame = function (frame, direction) {
        var frames = that.frames();
var t;
        for (var i = 0; i < frames.length; i++) {
            if (frames[i] == frame) {

                if (direction == -1 && i > 0) {
                    t = frames[i - 1];
                    frames[i - 1] = frames[i];
                    frames[i] = t;
                }

                if (direction == 1 && i < frames.length - 1) {
                    t = frames[i + 1];
                    frames[i + 1] = frames[i];
                    frames[i] = t;
                }

                break;
            }
        }

        that.frames(frames);
    };

    this.upFrame = function (frame) {
        that.moveFrame(frame, -1);
    };

    this.downFrame = function (frame) {
        that.moveFrame(frame, 1);
    }


};

Video.ViewModel = new Video._ViewModel();


Video.loadMusic = function () {

    var value = $(event.target).val();

    var realname = value.substring(value.lastIndexOf('\\') + 1, value.length);

    if (value) {
        if (value.indexOf('.') === -1 || jQuery.inArray(value.substr(value.lastIndexOf('.') + 1).toLowerCase(), Video.ViewModel.allowedMusicExts) == -1) {
            alert('Запрещенный формат файла!');
            return;
        }
    }

    Video.ViewModel.file_loader(true);

    $.ajaxFileUpload({
        url:'/upload_mp3',
        secureuri:false,
        fileElementId:'file_input',
        dataType:'json',
        success:function (data, status) {
            if (typeof(data.error) != 'undefined') {
                if (data.error != '') {
                    alert(data.error);
                } else {


                    Video.ViewModel.file_loader(false);
                    Video.ViewModel.custom_file(data.file);
                    Video.ViewModel.custom_file_realname(realname);
                    Video.ViewModel.selectedMusic(null);
                    $('.gallery-holder.sound .radioAreaChecked').removeClass('radioAreaChecked').addClass('radioArea');


                }
            }
        },
        error:function (data, status, e) {
            alert(e);
        }
    });
};

Video.loadFile = function (event) {

    var value = $(event.target).val();

    if (value) {
        if (value.indexOf('.') === -1 || jQuery.inArray(value.substr(value.lastIndexOf('.') + 1).toLowerCase(), Video.ViewModel.allowedImageExts) == -1) {
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
        // onShow method - change content of parent element
        onBeforeShow:function () {
            var text = this.getParent().find('img').attr('alt');
            this.getTooltip().html(text);
        },
        // Configuration properties
        content:'My Simpletip',
        offset:[-$('#page_step_1').offset().left, -$('#page_step_1').offset().top + 5]
    });

    soundManager.setup({
        useFlashBlock:false,
        url:'/js/swf/',
    });

});