<?
/**
 * Contact CTA - template part
 */

$id = $template_part_id;



?>

<div class="l-contact-form-cta-con l-outer">
	<div class="l-contact-form-cta l-inner clearfix">
		<div class="l-contact-cta-col l-left contact-cta-quote">
			<?php the_field('quote_content', $id); ?>
			<div class="contact-cta-quote-name">
				<?php the_field('quote_name', $id); ?>
			</div>
		</div>
		<div class="l-contact-cta-col l-right contact-cta-form">
			<?php echo do_shortcode('[contact-form-7 id="260" title="Contact an attorney"]'); ?>
		</div>
	</div>
</div>