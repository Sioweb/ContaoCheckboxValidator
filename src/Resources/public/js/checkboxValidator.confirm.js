if(window['jQuery'] !== undefined) {

	(function($){

		"use strict";

		var pluginName = 'checkboxValidatorConfirm',
			PluginClass;

		/* Enter PluginOptions */
		$[pluginName+'Default'] = {
			form: 'form',
			modalID: null,
			container: '.widget',
			title: 'TITLE',
			content: 'Lorem Ipsum Dolor Sit Amet!',
			button_accept: 'Absenden',
			button_abort: 'Abbrechen',
			invalid: function(element, selfObj, confirmObj) {},
			open: function(element, selfObj, confirmObj) {},
			added: function(selfObj, confirmObj) {},
			accept: function(selfObj, confirmObj) {},
			abort: function(selfObj, confirmObj) {},
		};

		PluginClass = function() {

			var selfObj = this;
			this.item = false;
			this.initOptions = new Object($[pluginName+'Default']);

			this.init = function(elem) {
				selfObj = this;

				this.elem = elem;
				this.item = $(this.elem);
				this.isHTML = selfObj.elem.tagName.toLowerCase() === 'html';

				this.valid = false;

				this.loaded();
			};

			this.modalPosition = function(confirmObj) {
				return {
					maxWidth: selfObj.item.closest('.widget'),
					maxHeight: 200,
					bottom: ($(window).height() - (selfObj.item.offset().top - $(window).scrollTop() + 50)),
					left: selfObj.item.offset().left - 20
				};
			};
		
			this.loaded = function() {
				selfObj = Object.assign(selfObj, selfObj.item.data('checkboxvalidatorconfirm'));
			};

			this.checkbox = function() {
				if(!selfObj.item.is(':checked')) {
					$.confirm({
						container: selfObj.item.closest('.widget'),
						modalID: selfObj.modalID,
						title: selfObj.title,
						content: selfObj.content,
						button_accept: selfObj.button_accept,
						button_abort: selfObj.button_abort,
						abort: function(confirmObj) {
							selfObj.abort(selfObj, confirmObj);
						},
						accept: function(confirmObj) {
							var $form = selfObj.item.closest('form');
							selfObj.item.attr('checked', true);
							selfObj.accept(selfObj, confirmObj);
						},
						added: function(confirmObj) {
							selfObj.added(selfObj, confirmObj);
							confirmObj.modal.css(selfObj.modalPosition(confirmObj));
						}
					});
					return false;
				}

				return true;
			};
			
		};

		$[pluginName] = $.fn[pluginName] = function(settings) {
			var element = typeof this === 'function'?$('html'):this,
				newData = arguments[1]||{},
				returnElement = [];
					
			returnElement[0] = element.each(function(k,i) {
				var pluginClass = $.data(this, pluginName);

				if(!settings || typeof settings === 'object' || settings === 'init') {

					if(!pluginClass) {
						if(settings === 'init') {
							settings = arguments[1] || {};
						}
						pluginClass = new PluginClass();

						var newOptions = new Object(pluginClass.initOptions);

						/* Space to reset some standart options */

						/***/
						if(settings) {
							newOptions = $.extend(true,{},newOptions,settings);
						}
						pluginClass = $.extend(newOptions,pluginClass);
						/** Initialisieren. */
						this[pluginName] = pluginClass;
						pluginClass.init(this);
						if(element.prop('tagName').toLowerCase() !== 'html') {
							$.data(this, pluginName, pluginClass);
						}
					} else {
						pluginClass.init(this,1);
						if(element.prop('tagName').toLowerCase() !== 'html') {
							$.data(this, pluginName, pluginClass);
						}
					}
				} else if(!pluginClass) {
					return;
				} else if(pluginClass[settings]) {
					var method = settings;
					returnElement[1] = pluginClass[method](newData);
				} else {
					return;
				}
			});

			if(returnElement[1] !== undefined) {
				return returnElement[1];
			}
			
			return returnElement[0];
		};
	})(jQuery);

	(function($) {$(function() {
		var checkboxValidatorElements = $('[type="checkbox"][name*="checkboxValidator"]'),
				checkboxValidatorForm = checkboxValidatorElements.closest('form'),
				$submit = checkboxValidatorForm.find('[type="submit"]');
		//

		if(!$submit.length) {
			$submit = checkboxValidatorForm.find('button.submit');
		};

		checkboxValidatorElements.each(function() {
			$(this).checkboxValidatorConfirm({
				form: checkboxValidatorForm
			})[0];
		});

		$submit.click(function(e) {
			e.stopPropagation();
			checkboxValidatorElements.each(function() {
				if(!$(this)[0].checkboxValidatorConfirm.checkbox()) {
					e.preventDefault();
					return false;
				}
			});
		});
	});})(jQuery);
}
