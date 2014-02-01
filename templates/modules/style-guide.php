<p>This is the Ascension style guide, which will help you to create beautiful and full featured child themes. All of the basic elements a child theme styles are located in this page, along with guides and tips for styling the rest of Ascension. This style guide is a great starting point for any child theme, but you may need to edit <samp>templates/modules/style-guide.php</samp> a bit to fit your exact needs.</p>


<h2 class="subheading">Headings (Subheading 1-6 <a href="#">Linked</a>)</h2>
<p>
	<h1>Heading 1 <a href="#">Linked</a></h1>
	<h2>Heading 2 <a href="#">Linked</a></h2>
	<h3>Heading 3 <a href="#">Linked</a></h3>
	<h4>Heading 4 <a href="#">Linked</a></h4>
	<h5>Heading 5 <a href="#">Linked</a></h5>
	<h6>Heading 6 <a href="#">Linked</a></h6>
</p>


<h2 class="subheading">Paragraph</h2>
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

<h2 class="subheading">Meta Text</h2>
<p class="meta">This is a meta text example.</p>

<h2 class="subheading">Caption</h2>
<p class="caption">This is a caption example.</p>

<h2 class="subheading">Blockquotes</h2>
<blockquote class="text-left">
	<p>Blockquote Left</p>
</blockquote>
<blockquote class="text-right">
	<p>Blockquote Right</p>
</blockquote>

<h2 class="subheading">Inline Quotes</h2>
<p><q>This is an inline quote wrapped in the q tag.</q></p>

<h2 class="subheading">Pre and Code Tags</h2>
<code>
<pre>
if ( typeof ascensionConfig != 'undefined' ) {
	var Ascension = jQuery.Ascension( ascensionConfig );
}
else {
	var Ascension = jQuery.Ascension();
}
</pre>
</code>

<h2 class="subheading">Links</h2>
<p>
	<a href="#">Regular Link</a>
</p>

<!--
<h2 class="subheading">Emphasis</h2>
<p><em>The em tag is used to stress emphasis.</em></p>

<h2 class="subheading">Strong</h2>
<p><strong>The strong tag is used to signify importance.</strong></p>

<h2 class="subheading">Mark</h2>
<p>Use the <mark>mark tag</mark> or <span class="highlight">highlight class</span> to highlight text.</p>

<h2 class="subheading">Small</h2>
<p><small>Fine print text is wrapped with the small tag.</small></p>

<h2 class="subheading">Big</h2>
<p><big>Make text big using the big tag.</big></p>

<h2 class="subheading">Strikethrough</h2>
<p>Use the <span class="strike">strikethrough</span> strike class to strikethrough text.</span></p>

<h2 class="subheading">Citation</h2>
<p><cite>This text is wrapped with the cite tag.</cite></p>

<h2 class="subheading">Definition</h2>
<p>The <dfn title="Used to create a definition for text.">dfn</dfn> tag and title attribute provide a definition for text.</p>

<h2 class="subheading">Abbreviation</h2>
<p>The <abbr title="abbriviation">abbr</abbr> tag and title attribute are used to identify abbreviations.</p>

<h2 class="subheading">Time</h2>
<p><time datetime="1993-02-2">2 February 1993</time></p>

<h2 class="subheading">Variable</h2>
<p>The <var>var</var> tag is used to identify a <var>variable</var>.</p>

<h2 class="subheading">Sample Output</h2>
<p>Use the <samp>samp tag</samp> to wrap sample output content.</p>

<h2 class="subheading">Keyboard Entry</h2>
<p>The kbd tag identifies keyboard buttons, such as <kbd>CTRL</kbd> + <kbd>ALT</kbd> + <kbd>DEL</kbd></p>

<h2 class="subheading">Superscript and Subscript</h2>
<p>Superscript (<sup>n</sup>) and subscript (<sub>n</sub>) for math equations, f(<var>x</var>, <var>n</var>) = log<sub>4</sub><var>x</var><sup><var>n</var></sup></p>

<h2 class="subheading">Del and Ins Tags</h2>
<p>Use the <del datetime="2001-07-30T13:00:00">delete</del> <ins datetime="2001-07-30T13:00:00">del</ins> and <del datetime="2001-07-30T13:00:00">insert</del> <ins datetime="2001-07-30T13:00:00">ins</ins> tag and datetime attribute to leave edited text intact.</p>
-->

<h2 class="subheading">Address</h2>
<address>
	1234 Main Street<br />
	Austin, TX 78704
</address>

<h2 class="subheading">Horizontal Rule</h2>
<hr />

<h2 class="subheading">Tables</h2>
<table>
	<thead>
		<tr>
			<th>Heading 1</th>
			<th>Heading 2</th>
			<th>Heading 3</th>
			<th>Heading 4</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Lorem ipsum</td>
			<td>Lorem ipsum</td>
			<td>Lorem ipsum</td>
			<td>Lorem ipsum</td>
		</tr>
		<tr>
			<td>Lorem ipsum</td>
			<td>Lorem ipsum</td>
			<td>Lorem ipsum</td>
			<td>Lorem ipsum</td>
		</tr>
		<tr>
			<td>Lorem ipsum</td>
			<td>Lorem ipsum</td>
			<td>Lorem ipsum</td>
			<td>Lorem ipsum</td>
		</tr>
	</tbody>
</table>


<h2 class="subheading">Ordered List</h2>
<ol>
	<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
	<li>Aliquam tincidunt mauris eu risus.</li>
	<li>Vestibulum auctor dapibus neque.
		<ol>
			<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
			<li>Aliquam tincidunt mauris eu risus.</li>
			<li>Vestibulum auctor dapibus neque.</li>
		</ol>
	</li>
	<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
</ol>

<h2 class="subheading">Unordered List</h2>
<ul>
	<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
	<li>Aliquam tincidunt mauris eu risus.</li>
	<li>Vestibulum auctor dapibus neque.
		<ul>
			<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
			<li>Aliquam tincidunt mauris eu risus.</li>
			<li>Vestibulum auctor dapibus neque.</li>
		</ul>
	</li>
	<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
</ul>

<h2 class="subheading">Definition List</h2>
<dl>
	<dt>Definition list</dt>
	<dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
	commodo consequat.</dd>
	<dt>Lorem ipsum dolor sit amet</dt>
	<dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
	commodo consequat.</dd>
</dl>

<h2 class="subheading">Plain List</h2>
<ul class="plain">
	<li>Item 1</li>
	<li>Item 2</li>
	<li>Item 3
		<ul class="plain">
			<li>Subitem 1</li>
			<li>Subitem 2</li>
			<li>Subitem 3</li>
		</ul>
	</li>
	<li>Item 4</li>
</ul>

<h2 class="subheading">Inline List</h2>
<ul class="inline">
	<li>Item 1</li>
	<li>Item 2</li>
	<li>Item 3
		<ul class="inline">
			<li>Subitem 1</li>
			<li>Subitem 2</li>
			<li>Subitem 3</li>
		</ul>
	</li>
	<li>Item 4</li>
</ul>

<h2 class="subheading">Forms</h2>
<form class="push-down" action="#" method="post">
	<div class="form-field">
		<label for="normal-input">Input</label>
		<input type="text" name="normal-input" id="normal-input" value="" />
	</div>

	<div class="form-field">
		<label for="radio">Radio</label>
		<input type="radio" name="radio" id="radio-1" value="option-1" /> Option 1<br />
		<input type="radio" name="radio" id="radio-2" value="option-2" /> Option 2<br />
		<input type="radio" name="radio" id="radio-3" value="option-3" /> Option 3<br />
	</div>

	<div class="form-field">
		<label for="select-dropdown">Select</label>
		<select name="select-dropdown" id="select-dropdown">
			<option value="option-1">Option 1</option>
			<option value="option-2">Option 2</option>
			<option value="option-3">Option 3</option>
		</select>
	</div>

	<div class="form-field">
		<label for="textarea">Textarea</label>
		<textarea cols="40" rows="8" name="textarea" id="textarea"></textarea>
	</div>

	<div class="form-field">
		<label for="checkbox">Checkbox</label>
		<input type="checkbox" name="checkbox" id="checkbox-1" value="option-1" /> Option 1<br />
		<input type="checkbox" name="checkbox" id="checkbox-2" value="option-2" /> Option 2<br />
		<input type="checkbox" name="checkbox" id="checkbox-3" value="option-3" /> Option 3<br />
	</div>

	<div class="form-field">
		<input class="form-submit button" type="submit" value="Submit" />
		<a href="#" class="form-reset">cancel</a>
	</div>
</form>

<h2 class="subheading">Buttons</h2>
<p>
	<button class="button">A normal button</button>
</p>
<p>
	<button class="special">A special button</button>
</p>
<p>
	<button class="callout">A callout button</button>
</p>
<p>
	<button class="disabled">A disabled button</button>
</p>
<p>
	<button class="activated">An activated button</button>
</p>
<p>
	<button class="narrow">A narrow button</button>
</p>
<p>
	<button class="small">A small button</button>
</p>
<p>
	<button class="large">A large button</button>
</p>
<p>
	<button class="full">A full button</button>
</p>

<h2 class="subheading">Notifications</h2>
<p class="notify alert">This is an alert notification with a <a href="#">Link</a></p>
<p class="notify warn">This is a warn notification with a <a href="#">Link</a></p>
<p class="notify info">This is an info notification with a <a href="#">Link</a></p>
<p class="notify success">This is a success notification with a <a href="#">Link</a></p>

<h2 class="subheading">Content Containers</h2>
<div class="callout-box push-down">
	<h2 class="callout-title">Title</h2>
	<p>Callout Box</p>
</div>

<div class="drop at-full push-down">
	<div class="drop-control">
		<h2 class="drop-title"><span class="icon dashicon-menu"></span> Dropdown</h2>
	</div>
	<div class="drop-content">
		<p>This is the dropdown content.</p>
	</div>
</div>

<p>
	This is a tooltip&nbsp;
	<span class="tip">
		<span class="tip-control"></span>
		<span class="tip-content">Tooltip Info.</span>
	</span>
	&nbsp;information box.
</p>

<h2 class="subheading">Icons</h2>
<p>These icons area created using the Dashicons and Genericons font pack. The CSS adds content:before which has a character code that's associated to an icon.</p>
<div class="push-down">
	<!-- icons -->
	<div class="icon icon-md dashicon-menu"></div>
	<div class="icon icon-md dashicon-admin-site"></div>
	<div class="icon icon-md dashicon-dashboard"></div>
	<div class="icon icon-md dashicon-admin-post"></div>
	<div class="icon icon-md dashicon-admin-media"></div>
	<div class="icon icon-md dashicon-admin-links"></div>
	<div class="icon icon-md dashicon-admin-page"></div>
	<div class="icon icon-md dashicon-admin-comments"></div>
	<div class="icon icon-md dashicon-admin-appearance"></div>
	<div class="icon icon-md dashicon-admin-plugins"></div>
	<div class="icon icon-md dashicon-admin-users"></div>
	<div class="icon icon-md dashicon-admin-tools"></div>
	<div class="icon icon-md dashicon-admin-settings"></div>
	<div class="icon icon-md dashicon-admin-network"></div>
	<div class="icon icon-md dashicon-admin-home"></div>
	<div class="icon icon-md dashicon-admin-generic"></div>
	<div class="icon icon-md dashicon-admin-collapse"></div>
	<div class="icon icon-md dashicon-welcome-write-blog"></div>
	<div class="icon icon-md dashicon-welcome-edit-page"></div>
	<div class="icon icon-md dashicon-welcome-add-page"></div>
	<div class="icon icon-md dashicon-welcome-view-site"></div>
	<div class="icon icon-md dashicon-welcome-widgets-menus"></div>
	<div class="icon icon-md dashicon-welcome-comments"></div>
	<div class="icon icon-md dashicon-welcome-learn-more"></div>
	<div class="icon icon-md dashicon-format-standard"></div>
	<div class="icon icon-md dashicon-format-aside"></div>
	<div class="icon icon-md dashicon-format-image"></div>
	<div class="icon icon-md dashicon-format-gallery"></div>
	<div class="icon icon-md dashicon-format-video"></div>
	<div class="icon icon-md dashicon-format-status"></div>
	<div class="icon icon-md dashicon-format-quote"></div>
	<div class="icon icon-md dashicon-format-links"></div>
	<div class="icon icon-md dashicon-format-chat"></div>
	<div class="icon icon-md dashicon-format-audio"></div>
	<div class="icon icon-md dashicon-camera"></div>
	<div class="icon icon-md dashicon-images-alt"></div>
	<div class="icon icon-md dashicon-images-alt2"></div>
	<div class="icon icon-md dashicon-video-alt"></div>
	<div class="icon icon-md dashicon-video-alt2"></div>
	<div class="icon icon-md dashicon-video-alt3"></div>
	<div class="icon icon-md dashicon-image-crop"></div>
	<div class="icon icon-md dashicon-image-rotate-left"></div>
	<div class="icon icon-md dashicon-image-rotate-right"></div>
	<div class="icon icon-md dashicon-image-flip-vertical"></div>
	<div class="icon icon-md dashicon-image-flip-horizontal"></div>
	<div class="icon icon-md dashicon-undo"></div>
	<div class="icon icon-md dashicon-redo"></div>
	<div class="icon icon-md dashicon-editor-bold"></div>
	<div class="icon icon-md dashicon-editor-italic"></div>
	<div class="icon icon-md dashicon-editor-ul"></div>
	<div class="icon icon-md dashicon-editor-ol"></div>
	<div class="icon icon-md dashicon-editor-quote"></div>
	<div class="icon icon-md dashicon-editor-alignleft"></div>
	<div class="icon icon-md dashicon-editor-aligncenter"></div>
	<div class="icon icon-md dashicon-editor-alignright"></div>
	<div class="icon icon-md dashicon-editor-insertmore"></div>
	<div class="icon icon-md dashicon-editor-spellcheck"></div>
	<div class="icon icon-md dashicon-editor-distractionfree"></div>
	<div class="icon icon-md dashicon-editor-kitchensink"></div>
	<div class="icon icon-md dashicon-editor-underline"></div>
	<div class="icon icon-md dashicon-editor-justify"></div>
	<div class="icon icon-md dashicon-editor-textcolor"></div>
	<div class="icon icon-md dashicon-editor-paste-word"></div>
	<div class="icon icon-md dashicon-editor-paste-text"></div>
	<div class="icon icon-md dashicon-editor-removeformatting"></div>
	<div class="icon icon-md dashicon-editor-video"></div>
	<div class="icon icon-md dashicon-editor-customchar"></div>
	<div class="icon icon-md dashicon-editor-outdent"></div>
	<div class="icon icon-md dashicon-editor-indent"></div>
	<div class="icon icon-md dashicon-editor-help"></div>
	<div class="icon icon-md dashicon-editor-strikethrough"></div>
	<div class="icon icon-md dashicon-editor-unlink"></div>
	<div class="icon icon-md dashicon-editor-rtl"></div>
	<div class="icon icon-md dashicon-align-left"></div>
	<div class="icon icon-md dashicon-align-right"></div>
	<div class="icon icon-md dashicon-align-center"></div>
	<div class="icon icon-md dashicon-align-none"></div>
	<div class="icon icon-md dashicon-lock"></div>
	<div class="icon icon-md dashicon-calendar"></div>
	<div class="icon icon-md dashicon-visibility"></div>
	<div class="icon icon-md dashicon-post-status"></div>
	<div class="icon icon-md dashicon-edit"></div>
	<div class="icon icon-md dashicon-trash"></div>
	<div class="icon icon-md dashicon-arrow-up"></div>
	<div class="icon icon-md dashicon-arrow-down"></div>
	<div class="icon icon-md dashicon-arrow-right"></div>
	<div class="icon icon-md dashicon-arrow-left"></div>
	<div class="icon icon-md dashicon-arrow-up-alt"></div>
	<div class="icon icon-md dashicon-arrow-down-alt"></div>
	<div class="icon icon-md dashicon-arrow-right-alt"></div>
	<div class="icon icon-md dashicon-arrow-left-alt"></div>
	<div class="icon icon-md dashicon-arrow-up-alt2"></div>
	<div class="icon icon-md dashicon-arrow-down-alt2"></div>
	<div class="icon icon-md dashicon-arrow-right-alt2"></div>
	<div class="icon icon-md dashicon-arrow-left-alt2"></div>
	<div class="icon icon-md dashicon-sort"></div>
	<div class="icon icon-md dashicon-leftright"></div>
	<div class="icon icon-md dashicon-list-view"></div>
	<div class="icon icon-md dashicon-exerpt-view"></div>
	<div class="icon icon-md dashicon-share"></div>
	<div class="icon icon-md dashicon-share-alt"></div>
	<div class="icon icon-md dashicon-share-alt2"></div>
	<div class="icon icon-md dashicon-twitter"></div>
	<div class="icon icon-md dashicon-rss"></div>
	<div class="icon icon-md dashicon-email"></div>
	<div class="icon icon-md dashicon-email-alt"></div>
	<div class="icon icon-md dashicon-facebook"></div>
	<div class="icon icon-md dashicon-facebook-alt"></div>
	<div class="icon icon-md dashicon-googleplus"></div>
	<div class="icon icon-md dashicon-networking"></div>
	<div class="icon icon-md dashicon-hammer"></div>
	<div class="icon icon-md dashicon-art"></div>
	<div class="icon icon-md dashicon-migrate"></div>
	<div class="icon icon-md dashicon-performance"></div>
	<div class="icon icon-md dashicon-wordpress"></div>
	<div class="icon icon-md dashicon-wordpress-alt"></div>
	<div class="icon icon-md dashicon-pressthis"></div>
	<div class="icon icon-md dashicon-update"></div>
	<div class="icon icon-md dashicon-screenoptions"></div>
	<div class="icon icon-md dashicon-info"></div>
	<div class="icon icon-md dashicon-cart"></div>
	<div class="icon icon-md dashicon-feedback"></div>
	<div class="icon icon-md dashicon-cloud"></div>
	<div class="icon icon-md dashicon-translation"></div>
	<div class="icon icon-md dashicon-tag"></div>
	<div class="icon icon-md dashicon-category"></div>
	<div class="icon icon-md dashicon-yes"></div>
	<div class="icon icon-md dashicon-no"></div>
	<div class="icon icon-md dashicon-no-alt"></div>
	<div class="icon icon-md dashicon-plus"></div>
	<div class="icon icon-md dashicon-minus"></div>
	<div class="icon icon-md dashicon-dismiss"></div>
	<div class="icon icon-md dashicon-marker"></div>
	<div class="icon icon-md dashicon-star-filled"></div>
	<div class="icon icon-md dashicon-star-half"></div>
	<div class="icon icon-md dashicon-star-empty"></div>
	<div class="icon icon-md dashicon-flag"></div>
	<div class="icon icon-md dashicon-location"></div>
	<div class="icon icon-md dashicon-location-alt"></div>
	<div class="icon icon-md dashicon-vault"></div>
	<div class="icon icon-md dashicon-shield"></div>
	<div class="icon icon-md dashicon-shield-alt"></div>
	<div class="icon icon-md dashicon-sos"></div>
	<div class="icon icon-md dashicon-search"></div>
	<div class="icon icon-md dashicon-slides"></div>
	<div class="icon icon-md dashicon-analytics"></div>
	<div class="icon icon-md dashicon-chart-pie"></div>
	<div class="icon icon-md dashicon-chart-bar"></div>
	<div class="icon icon-md dashicon-chart-line"></div>
	<div class="icon icon-md dashicon-chart-area"></div>
	<div class="icon icon-md dashicon-groups"></div>
	<div class="icon icon-md dashicon-businessman"></div>
	<div class="icon icon-md dashicon-id"></div>
	<div class="icon icon-md dashicon-id-alt"></div>
	<div class="icon icon-md dashicon-products"></div>
	<div class="icon icon-md dashicon-awards"></div>
	<div class="icon icon-md dashicon-forms"></div>
	<div class="icon icon-md dashicon-portfolio"></div>
	<div class="icon icon-md dashicon-book"></div>
	<div class="icon icon-md dashicon-book-alt"></div>
	<div class="icon icon-md dashicon-download"></div>
	<div class="icon icon-md dashicon-upload"></div>
	<div class="icon icon-md dashicon-backup"></div>
	<div class="icon icon-md dashicon-clock"></div>
	<div class="icon icon-md dashicon-lightbulb"></div>
	<div class="icon icon-md dashicon-desktop"></div>
	<div class="icon icon-md dashicon-tablet"></div>
	<div class="icon icon-md dashicon-smartphone"></div>
	<div class="icon icon-md dashicon-smiley"></div>
</div>
<div class="push-down">
	<!-- post formats -->
	<div class="icon icon-md genericon-standard" alt="f100"></div>
	<div class="icon icon-md genericon-aside" alt="f101"></div>
	<div class="icon icon-md genericon-image" alt="f102"></div>
	<div class="icon icon-md genericon-gallery" alt="f103"></div>
	<div class="icon icon-md genericon-video" alt="f104"></div>
	<div class="icon icon-md genericon-status" alt="f105"></div>
	<div class="icon icon-md genericon-quote" alt="f106"></div>
	<div class="icon icon-md genericon-link" alt="f107"></div>
	<div class="icon icon-md genericon-chat" alt="f108"></div>
	<div class="icon icon-md genericon-audio" alt="f109"></div>

	<!-- social icons -->
	<div class="icon icon-md genericon-github" alt="f200"></div>
	<div class="icon icon-md genericon-dribbble" alt="f201"></div>
	<div class="icon icon-md genericon-twitter" alt="f202"></div>
	<div class="icon icon-md genericon-facebook" alt="f203"></div>
	<div class="icon icon-md genericon-facebook-alt" alt="f204"></div>
	<div class="icon icon-md genericon-wordpress" alt="f205"></div>
	<div class="icon icon-md genericon-googleplus" alt="f206"></div>
	<div class="icon icon-md genericon-linkedin" alt="f207"></div>
	<div class="icon icon-md genericon-linkedin-alt" alt="f208"></div>
	<div class="icon icon-md genericon-pinterest" alt="f209"></div>
	<div class="icon icon-md genericon-pinterest-alt" alt="f210"></div>
	<div class="icon icon-md genericon-flickr" alt="f211"></div>
	<div class="icon icon-md genericon-vimeo" alt="f212"></div>
	<div class="icon icon-md genericon-youtube" alt="f213"></div>
	<div class="icon icon-md genericon-tumblr" alt="f214"></div>
	<div class="icon icon-md genericon-instagram" alt="f215"></div>
	<div class="icon icon-md genericon-codepen" alt="f216"></div>
	<div class="icon icon-md genericon-polldaddy" alt="f217"></div>
	<div class="icon icon-md genericon-googleplus-alt" alt="f218"></div>
	<div class="icon icon-md genericon-path" alt="f219"></div>
	<div class="icon icon-md genericon-skype" alt="f220"></div>
	<div class="icon icon-md genericon-digg" alt="f221"></div>
	<div class="icon icon-md genericon-reddit" alt="f222"></div>
	<div class="icon icon-md genericon-stumbleupon" alt="f223"></div>
	<div class="icon icon-md genericon-pocket" alt="f224"></div>

	<!-- meta icons -->
	<div class="icon icon-md genericon-comment" alt="f300"></div>
	<div class="icon icon-md genericon-category" alt="f301"></div>
	<div class="icon icon-md genericon-tag" alt="f302"></div>
	<div class="icon icon-md genericon-time" alt="f303"></div>
	<div class="icon icon-md genericon-user" alt="f304"></div>
	<div class="icon icon-md genericon-day" alt="f305"></div>
	<div class="icon icon-md genericon-week" alt="f306"></div>
	<div class="icon icon-md genericon-month" alt="f307"></div>
	<div class="icon icon-md genericon-pinned" alt="f308"></div>

	<!-- other icons -->
	<div class="icon icon-md genericon-search" alt="f400"></div>
	<div class="icon icon-md genericon-unzoom" alt="f401"></div>
	<div class="icon icon-md genericon-zoom" alt="f402"></div>
	<div class="icon icon-md genericon-show" alt="f403"></div>
	<div class="icon icon-md genericon-hide" alt="f404"></div>
	<div class="icon icon-md genericon-close" alt="f405"></div>
	<div class="icon icon-md genericon-close-alt" alt="f406"></div>
	<div class="icon icon-md genericon-trash" alt="f407"></div>
	<div class="icon icon-md genericon-star" alt="f408"></div>
	<div class="icon icon-md genericon-home" alt="f409"></div>
	<div class="icon icon-md genericon-mail" alt="f410"></div>
	<div class="icon icon-md genericon-edit" alt="f411"></div>
	<div class="icon icon-md genericon-reply" alt="f412"></div>
	<div class="icon icon-md genericon-feed" alt="f413"></div>
	<div class="icon icon-md genericon-warning" alt="f414"></div>
	<div class="icon icon-md genericon-share" alt="f415"></div>
	<div class="icon icon-md genericon-attachment" alt="f416"></div>
	<div class="icon icon-md genericon-location" alt="f417"></div>
	<div class="icon icon-md genericon-checkmark" alt="f418"></div>
	<div class="icon icon-md genericon-menu" alt="f419"></div>
	<div class="icon icon-md genericon-refresh" alt="f420"></div>
	<div class="icon icon-md genericon-minimize" alt="f421"></div>
	<div class="icon icon-md genericon-maximize" alt="f422"></div>
	<div class="icon icon-md genericon-404" alt="f423"></div>
	<div class="icon icon-md genericon-spam" alt="f424"></div>
	<div class="icon icon-md genericon-summary" alt="f425"></div>
	<div class="icon icon-md genericon-cloud" alt="f426"></div>
	<div class="icon icon-md genericon-key" alt="f427"></div>
	<div class="icon icon-md genericon-dot" alt="f428"></div>
	<div class="icon icon-md genericon-next" alt="f429"></div>
	<div class="icon icon-md genericon-previous" alt="f430"></div>
	<div class="icon icon-md genericon-expand" alt="f431"></div>
	<div class="icon icon-md genericon-collapse" alt="f432"></div>
	<div class="icon icon-md genericon-dropdown" alt="f433"></div>
	<div class="icon icon-md genericon-dropdown-left" alt="f434"></div>
	<div class="icon icon-md genericon-top" alt="f435"></div>
	<div class="icon icon-md genericon-draggable" alt="f436"></div>
	<div class="icon icon-md genericon-phone" alt="f437"></div>
	<div class="icon icon-md genericon-send-to-phone" alt="f438"></div>
	<div class="icon icon-md genericon-plugin" alt="f439"></div>
	<div class="icon icon-md genericon-cloud-download" alt="f440"></div>
	<div class="icon icon-md genericon-cloud-upload" alt="f441"></div>
	<div class="icon icon-md genericon-external" alt="f442"></div>
	<div class="icon icon-md genericon-document" alt="f443"></div>
	<div class="icon icon-md genericon-book" alt="f444"></div>
	<div class="icon icon-md genericon-cog" alt="f445"></div>
	<div class="icon icon-md genericon-unapprove" alt="f446"></div>
	<div class="icon icon-md genericon-cart" alt="f447"></div>
	<div class="icon icon-md genericon-pause" alt="f448"></div>
	<div class="icon icon-md genericon-stop" alt="f449"></div>
	<div class="icon icon-md genericon-skip-back" alt="f450"></div>
	<div class="icon icon-md genericon-skip-ahead" alt="f451"></div>
	<div class="icon icon-md genericon-play" alt="f452"></div>
	<div class="icon icon-md genericon-tablet" alt="f453"></div>
	<div class="icon icon-md genericon-send-to-tablet" alt="f454"></div>
	<div class="icon icon-md genericon-info" alt="f455"></div>
	<div class="icon icon-md genericon-notice" alt="f456"></div>
	<div class="icon icon-md genericon-help" alt="f457"></div>
	<div class="icon icon-md genericon-fastforward" alt="f458"></div>
	<div class="icon icon-md genericon-rewind" alt="f459"></div>
	<div class="icon icon-md genericon-portfolio" alt="f460"></div>
	<div class="icon icon-md genericon-heart" alt="f461"></div>
	<div class="icon icon-md genericon-code" alt="f462"></div>
	<div class="icon icon-md genericon-subscribe" alt="f463"></div>
	<div class="icon icon-md genericon-unsubscribe" alt="f464"></div>
	<div class="icon icon-md genericon-subscribed" alt="f465"></div>
	<div class="icon icon-md genericon-reply-alt" alt="f466"></div>
	<div class="icon icon-md genericon-reply-single" alt="f467"></div>
	<div class="icon icon-md genericon-flag" alt="f468"></div>
	<div class="icon icon-md genericon-print" alt="f469"></div>
	<div class="icon icon-md genericon-lock" alt="f470"></div>
	<div class="icon icon-md genericon-bold" alt="f471"></div>
	<div class="icon icon-md genericon-italic" alt="f472"></div>
	<div class="icon icon-md genericon-picture" alt="f473"></div>

	<!-- generic shapes -->
	<div class="icon icon-md genericon-uparrow" alt="f500"></div>
	<div class="icon icon-md genericon-rightarrow" alt="f501"></div>
	<div class="icon icon-md genericon-downarrow" alt="f502"></div>
	<div class="icon icon-md genericon-leftarrow" alt="f503"></div>
</div>

<h2 class="subheading">Pattern Library</h2>
<p>These are general Ascension layouts, modules and features that your child theme should cover.</p>

<dl>
	<dt>Header Image</dt>
	<dd>Ascension has a theme option to select between the default, banner, or widget header. There are also theme options to change the header title and text. Make sure your child theme takes these options into consideration or disables them.</dd>
	<dt>Main Navigation</dt>
	<dd>Ascension has a theme option to disable the main navigation, so your child theme should accommodate for this or disable the option.</dd>
	<dt>Scroll to Top</dt>
	<dd>The scroll to top box will activate, in the bottom right by default, once the page is scrolled down.</dd>
	<dt>Pagination</dt>
	<dd>Entries split into multiple pages will have pagination links in the entry footer.</dd>
	<dt>Next / Prev Links</dt>
	<dd>Archives with multiple pages of entries will have next and previous links at the bottom of the list.</dd>
	<dt>Icons</dt>
	<dd>Ascension uses a few basic icons, some from the Genericons font pack, which child themes can customize.</dd>
	<dt>Slider</dt>
	<dd>Ascension includes a slider widget which child themes can customize.
		<dl>
			<dt>Image</dt>
			<dd>The entries featured image is used as the slider image.</dd>
			<dt>Caption</dt>
			<dd>The widget has options for the caption location and child themes should accommodate for or disable this option.</dd>
			<dt>Controls</dt>
			<dd>The slider has directional navigation and a page navigation which can be styled.</dd>
		</dl>
	</dd>
	<dt>Posts</dt>
	<dd>These are the elements that make up a post and should be considered by child themes.
		<ul>
			<li>Basic post elements.
				<ul>
					<li>Title</li>
					<li>Content or Excerpt</li>
					<li>Thumbnail or Image</li>
					<li>Pagination</li>
					<li>Read More link</li>
					<li>Comment form and comments</li>
					<li>Edit link</li>
					<li>Posted By meta</li>
					<li>Posted On meta</li>
					<li>Category meta</li>
					<li>Tags meta</li>
					<li>Comment count meta</li>
				</ul>
			</li>
			<li>Sticky posts should be at the top of the archive list, and possibly have styling to make them stand out.</li>
			<li>Post with pages have pagination in the entry footer.</li>
			<li>Post formats included in Ascension
				<ul>
					<li>Aside</li>
				</ul>
			</li>
			<li>Pages have a theme option to toggle the title and details on or off.</li>
			<li>Category descriptions can be displayed at the top of an archive page if activated in the theme options.</li>
		</ul>
	</dd>
</dl>