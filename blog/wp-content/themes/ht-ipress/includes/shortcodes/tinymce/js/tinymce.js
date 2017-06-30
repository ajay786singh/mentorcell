(function() {
	tinymce.PluginManager.add( 'ht_shortcodes_mce_button', function( editor, url ) {
		editor.addButton( 'ht_shortcodes_mce_button', {
			title: 'HighThemes Shortcodes',
			type: 'menubutton',
			icon: 'icon ht-shortcodes-icon',
			menu: [


				/** Layout **/
				{
					text: 'Layout',
					menu: [

						/* Columns */
						{
							text: 'Columns',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Column',
									body: [

									// Column Size
									{
										type: 'listbox',
										name: 'columnSize',
										label: 'Size',
										'values': [
											{text: 'Full', value: 'full'},
											{text: '1/2', value: '1-2'},
											{text: '1/3', value: '1-3'},
											{text: '2/3', value: '2-3'},
											{text: '1/4', value: '1-4'},
											{text: '3/4', value: '3-4'},
											{text: '1/12', value: '1-12'},
											{text: '2/12', value: '2-12'},
											{text: '5/12', value: '5-12'},
											{text: '7/12', value: '7-12'},
											{text: '10/12', value: '10-12'},
											{text: '11/12', value: '11-12'},
										]
									},

									// Column Position
									{
										type: 'listbox',
										name: 'columnPosition',
										label: 'Position',
										'values': [
											{text: 'First', value: 'alpha'},
											{text: 'Middle', value: 'middle'},
											{text: 'Last', value: 'omega'}
										]
									},

									// Column Content
									{
										type: 'textbox',
										name: 'columnContent',
										label: 'Starting Content',
										value: 'Your content goes here.',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_col grid="' + e.data.columnSize + '" position="' + e.data.columnPosition + '"]<br />' + e.data.columnContent + '<br />[/ht_col]');
									}
								});
							}
						}, // End columns

						/* Spacing */
						{
							text: 'Spacing',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Spacing',
									body: [ {
										type: 'textbox', 
										name: 'spacingSize', 
										label: 'Height In Pixels',
										value: '30'
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_gap height="' + e.data.spacingSize + '"]');
									}
								});
							}
						}, // End spacing

						/* Dividers */
						{
							text: 'Dividers',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Divider',
									body: [

									// Divider Style
									{
										type: 'listbox',
										name: 'dividerStyle',
										label: 'Size',
										'values': [
											{text: 'Solid', value: 'solid'},
											{text: 'Dashed', value: 'dashed'},
											{text: 'Double', value: 'double'}
										]
									},

									// Divider Top Margin
									{
										type: 'textbox', 
										name: 'dividerTopMargin', 
										label: 'Top Margin In Pixels',
										value: '20'
									},

									// Divider Bottom Margin
									{
										type: 'textbox', 
										name: 'dividerBottomMargin', 
										label: 'Bottom Margin In Pixels',
										value: '20'
									} ],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_divider style="' + e.data.dividerStyle + '" margin_top="' + e.data.dividerTopMargin + '" margin_bottom="' + e.data.dividerBottomMargin + '"]');
									}
								});
							}
						} // End divider

					]
				}, // End Layout Section


				/** Elements **/
				{
					text: 'Elements',
					menu: [

						/* Buttons */
						{
							text: 'Button',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Button',
									body: [

									// Button Text
									{
										type: 'textbox',
										name: 'buttonText',
										label: 'Button: Text',
										value: 'Download'
									},

									// Button URL
									{
										type: 'textbox',
										name: 'buttonUrl',
										label: 'Button: URL',
										value: 'http://www.highthemes.com'
									},

									// Button Border Radius
									{
										type: 'textbox',
										name: 'buttonBorderRadius',
										label: 'Button: Border Radius',
										value: '3px'
									},

									// Button Color
									{
										type: 'listbox',
										name: 'buttonColor',
										label: 'Button: Color',
										'values': [
											{text: 'Default', value: 'colordefault'},
											{text: 'Emerald', value: 'color1'},
											{text: 'Yellow', value: 'color2'},
											{text: 'Pink', value: 'color3'},
											{text: 'Green', value: 'color4'},
											{text: 'Blue', value: 'color5'},
											{text: 'Dark Blue', value: 'color6'},
											{text: 'Red', value: 'color7'},
											{text: 'Asphalt', value: 'color8'}

										]
									},

									// Button Size
									{
										type: 'listbox',
										name: 'buttonSize',
										label: 'Button: Size',
										'values': [
											{text: 'Small', value: 'small'},
											{text: 'Medium', value: 'medium'},
											{text: 'Large', value: 'large'}
										]
									},

									// Button Link Target
									{
										type: 'listbox',
										name: 'buttonLinkTarget',
										label: 'Button: Link Target',
										'values': [
											{text: 'Self', value: '_self'},
											{text: 'Blank', value: '_blank'}
										]
									},

									// Button Rel
									{
										type: 'listbox',
										name: 'buttonRel',
										label: 'Button: Rel',
										'values': [
											{text: 'None', value: ''},
											{text: 'Nofollow', value: 'nofollow'}
										]
									}

									 ],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_button link="' + e.data.buttonUrl + '" color="' + e.data.buttonColor + '" size="' + e.data.buttonSize + '" border_radius="' + e.data.buttonBorderRadius + '" target="' + e.data.buttonLinkTarget + '" rel="' + e.data.buttonRel + '" title="' + e.data.buttonText + '"]');
									}
								});
							}
						}, // End button

						
						/* Heading */
						{
							text: 'Heading',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Heading',
									body: [

									// Heading Title
									{
										type: 'textbox',
										name: 'headingTitle',
										label: 'Title',
										value: 'This is a heading'
									},

									// Heading Font Size
									{
										type: 'textbox',
										name: 'headingFontSize',
										label: 'Font Size',
										value: ''
									},

									// Heading Color
									{
										type: 'textbox',
										name: 'headingColor',
										label: 'Heading Hex Color',
										value: ''
									},

									// Heading Top Margin
									{
										type: 'textbox',
										name: 'headingMarginTop',
										label: 'Top Margin',
										value: '30'
									},

									// Heading Bottom Margin
									{
										type: 'textbox',
										name: 'headingMarginBottom',
										label: 'Bottom Margin',
										value: '30'
									},

									// Heading Type
									{
										type: 'listbox',
										name: 'headingType',
										label: 'Type',
										'values': [
											{text: 'h1', value: 'h1'},
											{text: 'h2', value: 'h2'},
											{text: 'h3', value: 'h3'},
											{text: 'h4', value: 'h4'},
											{text: 'h5', value: 'h5'},
											{text: 'span', value: 'span'},
											{text: 'div', value: 'div'}
										]
									},

									// Heading Style
									{
										type: 'listbox',
										name: 'headingStyle',
										label: 'Style',
										'values': [
											{text: 'Solid Bottom Border', value: ''},
											{text: 'Double Line', value: 'double-line'},
											{text: 'Dashed Line', value: 'dashed-line'},
											{text: 'Dotted Line', value: 'dotted-line'}
										]
									},

									// Heading Text Align
									{
										type: 'listbox',
										name: 'headingTextAlign',
										label: 'Text Align',
										'values': [
											{text: 'Left', value: 'left'},
											{text: 'Center', value: 'center'},
											{text: 'Right', value: 'right'}
										]
									}
									],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_heading style="' + e.data.headingStyle + '" title="' + e.data.headingTitle + '" type="' + e.data.headingType + '" font_size="' + e.data.headingFontSize + '" text_align="' + e.data.headingTextAlign + '" margin_top="' + e.data.headingMarginTop + '" margin_bottom="' + e.data.headingMarginBottom + '" color="' + e.data.headingColor + '"]' );
									}
								});
							}
						}, // End heading

						/* Fancy Title */
						{
							text: 'Fancy Title',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Fancy Title',
									body: [

									// Highlight Color
									{
										type: 'listbox',
										name: 'titleColor',
										label: 'Color',
										'values': [
											{text: 'Default', value: 'colordefault'},
											{text: 'Emerald', value: 'color1'},
											{text: 'Yellow', value: 'color2'},
											{text: 'Pink', value: 'color3'},
											{text: 'Green', value: 'color4'},
											{text: 'Blue', value: 'color5'},
											{text: 'Dark Blue', value: 'color6'},
											{text: 'Red', value: 'color7'},
											{text: 'Asphalt', value: 'color8'}
										]
									},

									// Highlight Content
									{
										type: 'textbox', 
										name: 'titleContent', 
										label: 'Text',
										value: 'Nice Title goes here'
									}],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_fancy_title color="' + e.data.titleColor + '" title="' + e.data.titleContent + '"]');
									}
								});
							}
						}, // End Fancy Title

						/* Highlights */
						{
							text: 'Highlights',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Highlight',
									body: [

									// Highlight Color
									{
										type: 'listbox',
										name: 'highlightColor',
										label: 'Color',
										'values': [
											{text: 'Blue', value: 'blue'},
											{text: 'Green', value: 'green'},
											{text: 'Yellow', value: 'yellow'},
											{text: 'Red', value: 'red'},
											{text: 'Gray', value: 'gray'}
										]
									},

									// Highlight Content
									{
										type: 'textbox', 
										name: 'highlightContent', 
										label: 'Highlighted Text',
										value: 'hey check me out'
									}],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_highlight color="' + e.data.highlightColor + '"]' + e.data.highlightContent + '[/ht_highlight]');
									}
								});
							}
						}, // End highlights

						/* Google Map */
						{
							text: 'Google Map',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Google Map',
									body: [

									// Google Map Title
									{
										type: 'textbox',
										name: 'gmapTitle',
										label: 'Title',
										value: 'Welcome To Las Vegas'
									},

									// Google Map Location
									{
										type: 'textbox',
										name: 'gmapLocation',
										label: 'Location',
										value: 'Las Vegas, Nevada'
									},

									// Google Map Height
									{
										type: 'textbox',
										name: 'gmapHeight',
										label: 'Height',
										value: '300'
									},

									// Google Map Zoom
									{
										type: 'textbox',
										name: 'gmapZoom',
										label: 'Zoom',
										value: '15'
									}

									],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_googlemap title="' + e.data.gmapTitle + '" location="' + e.data.gmapLocation + '" height="' + e.data.gmapHeight + '" zoom="' + e.data.gmapZoom + '"]');
									}
								});
							}
						}, // End GoogleMaps

							/* Quote */
						{
							text: 'Quote',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Quote',
									body: [

									// Quote 
									{
										type: 'listbox',
										name: 'quoteAlign',
										label: 'Alignment',
										'values': [
											{text: 'Default', value: 'default'}	,															
											{text: 'Left', value: 'left'},
											{text: 'Right', value: 'right'}
										]
									},

									// Content
									{
										type: 'textbox',
										name: 'quoteContent',
										label: 'Content',
										value: 'Lorem ipsum dolor sit amet goes here',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									}

									],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_quote align="' + e.data.quoteAlign + '"]'+e.data.quoteContent+'[/ht_quote]');
									}
								});
							}
						}, // End callout						
							
							/* Notification Boxes */
						{
							text: 'Notification Box',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Note Box',
									body: [

									{
										type: 'listbox',
										name: 'noteType',
										label: 'Type',
										'values': [
											{text: 'Success', value: 'success'},
											{text: 'Error', value: 'error'},
											{text: 'Warning', value: 'warning'},								
											{text: 'Info', value: 'info'}
										]
									},

									// Content
									{
										type: 'textbox',
										name: 'title',
										label: 'Content',
										value: 'Lorem ipsum dolor sit amet goes here',
										multiline: true,
										minWidth: 300,
										minHeight: 100
									}

									],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_notification type="' + e.data.noteType + '" title="' + e.data.title + '" ]');
									}
								});
							}
						}, // End callout


						/* Social Icon */
						{
							text: 'Social Icon',
							onclick: function() {
								editor.windowManager.open( {
									title: 'HighThemes Shortcodes - Insert Social Icon',
									body: [

									// Social Icon
									{
										type: 'listbox',
										name: 'socialIcon',
										label: 'Service',
										'values': [
											{text: 'Twitter', value: 'fa-twitter'},
											{text: 'Facebook', value: 'fa-facebook'},
											{text: 'Flickr', value: 'fa-flickr'},
											{text: 'Github', value: 'fa-github'},
											{text: 'Google Plus', value: 'fa-google-plus'},
											{text: 'Instagram', value: 'fa-instagram'},
											{text: 'LinkedIn', value: 'fa-linkedin'},
											{text: 'Pinterest', value: 'fa-pinterest'},
											{text: 'Tumblr', value: 'fa-tumblr'},
											{text: 'Twitter', value: 'fa-twitter'},
											{text: 'Vimeo', value: 'fa-vimeo-square'},
											{text: 'Youtube', value: 'fa-youtube'},
											{text: 'RSS', value: 'fa-rss'}
										]
									},

									// Social Icon URL
									{
										type: 'textbox',
										name: 'socialIconUrl',
										label: 'Link URL',
										value: 'twitter.com/theHighThemes/'
									},

									// Social Icon URL Title
									{
										type: 'textbox',
										name: 'socialIconUrlTitle',
										label: 'Title Tag',
										value: 'Follow Me'
									},

									// Social Icon Link Target
									{
										type: 'listbox',
										name: 'socialIconUrlTarget',
										label: 'Link Target',
										'values': [
											{text: 'Self', value: '_self'},
											{text: 'Blank', value: '_blank'}
										]
									},

									// Social Icon Link Rel
									{
										type: 'listbox',
										name: 'socialIconUrlRel',
										label: 'Link Rel',
										'values': [
											{text: 'None', value: ''},
											{text: 'NoFollow', value: 'nofollow'}
										]
									}

									],
									onsubmit: function( e ) {
										editor.insertContent( '[ht_social icon="' + e.data.socialIcon + '" url="' + e.data.socialIconUrl + '" title="' + e.data.socialIconUrlTitle + '" target="' + e.data.socialIconUrlTarget + '" rel="' + e.data.socialIconUrlRel + '"]');
									}
								});
							}
						} // End Social icon


					]
				} // End Elements Section



			]
		});
	});
})();