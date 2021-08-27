"use strict";

!function (NioApp, $) {
  "use strict";

  NioApp.Package.name = "DashLite";
  NioApp.Package.version = "1.0.0";
  var $win = $(window),
      $body = $('body'),
      $doc = $(document),
      //class names
  _body_theme = 'nio-theme',
      _menu = 'nk-menu',
      _short_nav = 'short-nav',
      _mobile_nav = 'mobile-menu',
      _header = 'nk-header',
      _header_menu = 'nk-header-menu',
      _aside = 'nk-aside',
      _sidebar = 'nk-sidebar',
      _sidebar_mob = 'nk-sidebar-mobile',
      _sidebar_fat = 'nk-sidebar-fat',
      _app_sidebar = 'nk-apps-sidebar',
      _content_sidebar = 'nk-content-sidebar',
      //breakpoints
  _break = NioApp.Break;

  function extend(obj, ext) {
    Object.keys(ext).forEach(function (key) {
      obj[key] = ext[key];
    });
    return obj;
  } // ClassInit @v1.0


  NioApp.ClassBody = function () {
    NioApp.AddInBody(_aside);
    NioApp.AddInBody(_app_sidebar);
    NioApp.AddInBody(_sidebar);
    NioApp.AddInBody(_sidebar_fat);
  }; // ClassInit @v1.0


  NioApp.ClassNavMenu = function () {
    NioApp.BreakClass('.' + _header_menu, _break.lg, {
      timeOut: 0
    });
    NioApp.BreakClass('.' + _aside, _break.lg, {
      timeOut: 0
    });
    NioApp.BreakClass('.' + _content_sidebar, _break.lg, {
      timeOut: 0
    });
    NioApp.BreakClass('.' + _sidebar, _break.lg, {
      timeOut: 0,
      classAdd: _sidebar_mob
    });
    NioApp.BreakClass('.' + _sidebar_fat, _break.xl, {
      timeOut: 0,
      classAdd: _sidebar_mob
    });
    $win.on('resize', function () {
      NioApp.BreakClass('.' + _header_menu, _break.lg);
      NioApp.BreakClass('.' + _aside, _break.lg);
      NioApp.BreakClass('.' + _content_sidebar, _break.lg);
      NioApp.BreakClass('.' + _sidebar, _break.lg, {
        classAdd: _sidebar_mob
      });
      NioApp.BreakClass('.' + _sidebar_fat, _break.xl, {
        classAdd: _sidebar_mob
      });
    });
  }; // Code Prettify @v1.0

  NioApp.CurrentLink = function () {
    var _link = '.nk-menu-link, .menu-link, .nav-link',
        _currentURL = window.location.href,
        fileSplit,
        lastPath1,
        lastPath2,
        lastPath,
        fileName = _currentURL.substring(0, _currentURL.indexOf("#") == -1 ? _currentURL.length : _currentURL.indexOf("#"));

    fileName = fileName.substring(0, fileName.indexOf("?") == -1 ? fileName.length : fileName.indexOf("?")), fileName = fileName.charAt(fileName.length - 1) === '/' ? fileName.substring(0, fileName.length - 1) : fileName, fileSplit = fileName.split('/'), lastPath = fileSplit.length > 0 ? fileSplit[fileSplit.length - 1] : fileSplit;
    $(_link).each(function () {
      var self = $(this),
          _self_link = self.attr('href'),
          _self_path = _self_link.charAt(_self_link.length - 1) === '/' ? _self_link.substring(0, _self_link.length - 1) : _self_link,
          _self_split = _self_path.split('/'),
          _self_last = _self_split.length > 0 ? _self_split[_self_split.length - 1] : _self_split;

      if (_self_last === lastPath) {
        self.closest("li").addClass('active current-page').parents().closest("li").addClass("active current-page");
        self.closest("li").children('.nk-menu-sub').css('display', 'block');
        self.parents().closest("li").children('.nk-menu-sub').css('display', 'block');
      } else {
        self.closest("li").removeClass('active current-page').parents().closest("li:not(.current-page)").removeClass("active");
      }
    });
  }; // PasswordSwitch @v1.0


  NioApp.PassSwitch = function () {
    NioApp.Passcode('.passcode-switch');
  }; // Toastr Message @v1.0 


  NioApp.Toast = function (msg, ttype, opt) {
    var ttype = ttype ? ttype : 'info',
        msi = '',
        ticon = ttype === 'info' ? 'ni ni-info-fill' : ttype === 'success' ? 'ni ni-check-circle-fill' : ttype === 'error' ? 'ni ni-cross-circle-fill' : ttype === 'warning' ? 'ni ni-alert-fill' : '',
        def = {
      position: 'bottom-right',
      ui: '',
      icon: 'auto',
      clear: false
    },
        attr = opt ? extend(def, opt) : def;
    attr.position = attr.position ? 'toast-' + attr.position : 'toast-bottom-right';
    attr.icon = attr.icon === 'auto' ? ticon : attr.icon ? attr.icon : '';
    attr.ui = attr.ui ? ' ' + attr.ui : '';
    msi = attr.icon !== '' ? '<span class="toastr-icon"><em class="icon ' + attr.icon + '"></em></span>' : '', msg = msg !== '' ? msi + '<div class="toastr-text">' + msg + '</div>' : '';

    if (msg !== "") {
      if (attr.clear === true) {
        toastr.clear();
      }

      var option = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": attr.position + attr.ui,
        "closeHtml": '<span class="btn-trigger">Close</span>',
        "preventDuplicates": true,
        "showDuration": "1500",
        "hideDuration": "1500",
        "timeOut": "2000",
        "toastClass": "toastr",
        "extendedTimeOut": "3000"
      };
      toastr.options = extend(option, attr);
      toastr[ttype](msg);
    }
  }; // Toggle Screen @v1.0


  NioApp.TGL.screen = function (elm) {
    if ($(elm).exists()) {
      $(elm).each(function () {
        var ssize = $(this).data('toggle-screen');

        if (ssize) {
          $(this).addClass('toggle-screen-' + ssize);
        }
      });
    }
  }; // Toggle Content @v1.0


  NioApp.TGL.content = function (elm, opt) {
    var toggle = elm ? elm : '.toggle',
        $toggle = $(toggle),
        $contentD = $('[data-content]'),
        toggleBreak = true,
        toggleCurrent = false,
        def = {
      active: 'active',
      content: 'content-active',
      "break": toggleBreak
    },
        attr = opt ? extend(def, opt) : def;
    NioApp.TGL.screen($contentD);
    $toggle.on('click', function (e) {
      toggleCurrent = this;
      NioApp.Toggle.trigger($(this).data('target'), attr);
      e.preventDefault();
    });
    $doc.on('mouseup', function (e) {
      if (toggleCurrent) {
        var $toggleCurrent = $(toggleCurrent);

        if (!$toggleCurrent.is(e.target) && $toggleCurrent.has(e.target).length === 0 && !$contentD.is(e.target) && $contentD.has(e.target).length === 0) {
          NioApp.Toggle.removed($toggleCurrent.data('target'), attr);
          toggleCurrent = false;
        }
      }
    });
    $win.on('resize', function () {
      $contentD.each(function () {
        var content = $(this).data('content'),
            ssize = $(this).data('toggle-screen'),
            toggleBreak = _break[ssize];

        if (NioApp.Win.width > toggleBreak) {
          NioApp.Toggle.removed(content, attr);
        }
      });
    });
  }; // ToggleExpand @v1.0


  NioApp.TGL.expand = function (elm, opt) {
    var toggle = elm ? elm : '.expand',
        def = {
      toggle: true
    },
        attr = opt ? extend(def, opt) : def;
    $(toggle).on('click', function (e) {
      NioApp.Toggle.trigger($(this).data('target'), attr);
      e.preventDefault();
    });
  }; // Dropdown Menu @v1.0


  NioApp.TGL.ddmenu = function (elm, opt) {
    var imenu = elm ? elm : '.nk-menu-toggle',
        def = {
      active: 'active',
      self: 'nk-menu-toggle',
      child: 'nk-menu-sub'
    },
        attr = opt ? extend(def, opt) : def;
    $(imenu).on('click', function (e) {
      if (NioApp.Win.width < _break.lg || $(this).parents().hasClass(_sidebar) || $(this).parents().hasClass(_aside)) {
        NioApp.Toggle.dropMenu($(this), attr);
      }

      e.preventDefault();
    });
  }; // Show Menu @v1.0


  NioApp.TGL.showmenu = function (elm, opt) {
    var toggle = elm ? elm : '.nk-nav-toggle',
        $toggle = $(toggle),
        $contentD = $('[data-content]'),
        toggleBreak = $body.hasClass(_short_nav) || $contentD.hasClass(_header_menu) ? _break.lg : _break.xl,
        toggleOlay = _sidebar + '-overlay',
        toggleClose = {
      profile: true,
      menu: false
    },
        def = {
      active: 'toggle-active',
      content: _sidebar + '-active',
      body: 'nav-shown',
      overlay: toggleOlay,
      "break": toggleBreak,
      close: toggleClose
    },
        attr = opt ? extend(def, opt) : def;
    $toggle.on('click', function (e) {
      NioApp.Toggle.trigger($(this).data('target'), attr);
      e.preventDefault();
    });
    $doc.on('mouseup', function (e) {
      if (!$toggle.is(e.target) && $toggle.has(e.target).length === 0 && !$contentD.is(e.target) && $contentD.has(e.target).length === 0 && NioApp.Win.width < toggleBreak) {
        NioApp.Toggle.removed($toggle.data('target'), attr);
      }
    });
    $win.on('resize', function () {
      if (NioApp.Win.width < _break.xl || NioApp.Win.width < toggleBreak) {
        NioApp.Toggle.removed($toggle.data('target'), attr);
      }
    });
  }; // Animate FormSearch @v1.0


  NioApp.Ani.formSearch = function (elm, opt) {
    var def = {
      active: 'active',
      timeout: 400,
      target: '[data-search]'
    },
        attr = opt ? extend(def, opt) : def;
    var $elem = $(elm),
        $target = $(attr.target);

    if ($elem.exists()) {
      $elem.on('click', function (e) {
        e.preventDefault();
        var $self = $(this),
            the_target = $self.data('target'),
            $self_st = $('[data-search=' + the_target + ']'),
            $self_tg = $('[data-target=' + the_target + ']');

        if (!$self_st.hasClass(attr.active)) {
          $self_tg.add($self_st).addClass(attr.active);
          $self_st.find('input').focus();
        } else {
          $self_tg.add($self_st).removeClass(attr.active);
          setTimeout(function () {
            $self_st.find('input').val('');
          }, attr.timeout);
        }
      });
      $doc.on({
        keyup: function keyup(e) {
          if (e.key === "Escape") {
            $elem.add($target).removeClass(attr.active);
          }
        },
        mouseup: function mouseup(e) {
          if (!$target.find('input').val() && !$target.is(e.target) && $target.has(e.target).length === 0 && !$elem.is(e.target) && $elem.has(e.target).length === 0) {
            $elem.add($target).removeClass(attr.active);
          }
        }
      });
    }
  }; // Animate FormElement @v1.0


  NioApp.Ani.formElm = function (elm, opt) {
    var def = {
      focus: 'focused'
    },
        attr = opt ? extend(def, opt) : def;

    if ($(elm).exists()) {
      $(elm).each(function () {
        var $self = $(this);

        if ($self.val()) {
          $self.parent().addClass(attr.focus);
        }

        $self.on({
          focus: function focus() {
            $self.parent().addClass(attr.focus);
          },
          blur: function blur() {
            if (!$self.val()) {
              $self.parent().removeClass(attr.focus);
            }
          }
        });
      });
    }
  }; // Form Validate @v1.0


  NioApp.Validate = function (elm, opt) {
    if ($(elm).exists()) {
      $(elm).each(function () {
        var def = {
          errorElement: "span"
        },
            attr = opt ? extend(def, opt) : def;
        $(this).validate(attr);
      });
    }
  };

  NioApp.Validate.init = function () {
    NioApp.Validate('.form-validate', {
      errorElement: "span",
      errorClass: "invalid",
      errorPlacement: function errorPlacement(error, element) {
        error.appendTo(element.parent());
      }
    });
  }; // BootStrap Extended


  NioApp.BS.ddfix = function (elm, exc) {
    var dd = elm ? elm : '.dropdown-menu',
        ex = exc ? exc : 'a:not(.clickable), button:not(.clickable), a:not(.clickable) *, button:not(.clickable) *';
    $(dd).on('click', function (e) {
      if (!$(e.target).is(ex)) {
        e.stopPropagation();
        return;
      }
    });
  }; // BootStrap Specific Tab Open


  NioApp.BS.tabfix = function (elm) {
    var tab = elm ? elm : '[data-toggle="modal"]';
    $(tab).on('click', function () {
      var _this = $(this),
          target = _this.data('target'),
          target_href = _this.attr('href'),
          tg_tab = _this.data('tab-target');

      var modal = target ? $body.find(target) : $body.find(target_href);

      if (tg_tab && tg_tab !== '#' && modal) {
        modal.find('[href="' + tg_tab + '"]').tab('show');
      } else if (modal) {
        var tabdef = modal.find('.nk-nav.nav-tabs');
        var link = $(tabdef[0]).find('[data-toggle="tab"]');
        $(link[0]).tab('show');
      }
    });
  };

  // Dropzone @v1.0
  NioApp.Dropzone = function (elm, opt) {
    if ($(elm).exists()) {
      $(elm).each(function () {
        var def = {
          autoDiscover: false
        },
            attr = opt ? extend(def, opt) : def;
        $(this).addClass('dropzone').dropzone(attr);
      });
    }
  };

  NioApp.Dropzone.init = function () {
    NioApp.Dropzone('.upload-zone', {
      url: "/images"
    });
  }; 

  NioApp.Select2.init = function () {
    NioApp.Select2('.form-select');
  }; 

  NioApp.OtherInit = function () {
    NioApp.ClassBody();
    NioApp.PassSwitch();
    NioApp.CurrentLink();
    NioApp.ClassNavMenu();
  };


  NioApp.Ani.init = function () {
    NioApp.Ani.formElm('.form-control-animate');
    NioApp.Ani.formSearch('.toggle-search');
  }; 


  NioApp.BS.init = function () {
    NioApp.BS.menutip('a.nk-menu-link');
    NioApp.BS.tooltip('.nk-tooltip');
    NioApp.BS.tooltip('.btn-tooltip', {
      placement: 'top'
    });
    NioApp.BS.tooltip('[data-toggle="tooltip"]');
    NioApp.BS.tooltip('.tipinfo', {
      placement: 'right'
    });
    NioApp.BS.popover('[data-toggle="popover"]');
    NioApp.BS.progress('[data-progress]');
    NioApp.BS.fileinput('.custom-file-input');
    NioApp.BS.modalfix();
    NioApp.BS.ddfix();
    NioApp.BS.tabfix();
  }; 


  NioApp.Picker.init = function () {
    NioApp.Picker.date('.date-picker');
    NioApp.Picker.dob('.date-picker-alt');
    NioApp.Picker.time('.time-picker');
  }; 


  NioApp.Addons.Init = function () {
    NioApp.Select2.init();
    NioApp.Dropzone.init();
  }; 


  NioApp.TGL.init = function () {
    NioApp.TGL.content('.toggle');
    NioApp.TGL.expand('.toggle-expand');
    NioApp.TGL.showmenu('.nk-nav-toggle');
    NioApp.TGL.ddmenu('.' + _menu + '-toggle', {
      self: _menu + '-toggle',
      child: _menu + '-sub'
    });
  };

  NioApp.BS.modalOnInit = function () {
    $('.modal').on('shown.bs.modal', function () {
      NioApp.Select2.init();
      NioApp.Validate.init();
    });
  }; 

  ///////////////////////////////////////////
  // Initial by default
  /////////////////////////////

  NioApp.init = function () {
    NioApp.coms.docReady.push(NioApp.OtherInit);
    NioApp.coms.docReady.push(NioApp.Prettify);
    NioApp.coms.docReady.push(NioApp.ColorBG);
    NioApp.coms.docReady.push(NioApp.ColorTXT); 
    NioApp.coms.docReady.push(NioApp.Ani.init);
    NioApp.coms.docReady.push(NioApp.TGL.init);
    NioApp.coms.docReady.push(NioApp.BS.init);
    NioApp.coms.docReady.push(NioApp.Validate.init);
    NioApp.coms.docReady.push(NioApp.Picker.init);
    NioApp.coms.docReady.push(NioApp.Addons.Init);
  };

  NioApp.init();
  return NioApp;
}(NioApp, jQuery);