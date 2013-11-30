<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_search_civievent
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>


<dl class="search-results<?php echo $this->pageclass_sfx; ?>">
<?php foreach($this->results as $result) : ?>
	<dt class="result-title">
		<?php echo $this->pagination->limitstart + $result->count.'. ';?>
		<?php if ($result->href) :?>
			<a href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) :?> target="_blank"<?php endif;?>>
				<?php echo $this->escape($result->title);?>
			</a>

		<?php else:?>
			<?php echo $this->escape($result->title);?>
		<?php endif; ?>


	</dt>
        <?php // Hmm002. We could remove this code or let the user hide it via CSS.  For now, the latter ?>
	<?php if ($result->section) : ?>
		<dd class="result-category">
			<span class="small<?php echo $this->pageclass_sfx; ?>">
				(<?php echo $this->escape($result->section); ?>)
			</span>
		</dd>
	<?php endif; ?>


			<dd class='result-event_start_date'>
                <?php 
		      $oDate = new DateTime($result->start_date);
		      echo $oDate->format("l, F j, Y g:i A");
		      // Hmm001. at some point, we should let the user choose if we show the dates at all and pass us a formating string.
		?>
		       </dd>




	<dd class="result-text">		
		<?php echo $result->text; ?>
	</dd>
	<?php if ($this->params->get('show_date')) : ?>
		<dd class="result-created<?php echo $this->pageclass_sfx; ?>">
			<?php echo JText::sprintf('JGLOBAL_CREATED_DATE_ON', $result->created); ?>
		</dd>
	<?php endif; ?>
<?php endforeach; ?>
</dl>

<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>
