<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<h2>
	<?php _e( 'Shipping Classes', 'woocommerce' ); ?>
	<?php echo wc_help_tip( __( 'Shipping classes can be used to group products of similar type and can be used by some Shipping Methods (such as Flat Rate Shipping) to provide different rates to different classes of product.', 'woocommerce' ) ); ?>
</h2>

<table class="wc-shipping-classes widefat">
	<thead>
		<tr>
			<?php foreach ( $shipping_class_columns as $class => $heading ) : ?>
				<th class="<?php echo esc_attr( $class ); ?>"><?php echo esc_html( $heading ); ?></th>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="<?php echo absint( sizeof( $shipping_class_columns ) ); ?>">
				<input type="submit" name="save" class="button button-primary wc-shipping-class-save" value="<?php esc_attr_e( 'Save Shipping Classes', 'woocommerce' ); ?>" disabled />
				<a class="button button-secondary wc-shipping-class-add" href="#"><?php esc_html_e( 'Add Shipping Class', 'woocommerce' ); ?></a>
			</td>
		</tr>
	</tfoot>
	<tbody class="wc-shipping-class-rows"></tbody>
</table>

<script type="text/html" id="tmpl-wc-shipping-class-row-blank">
	<tr>
		<td class="wc-shipping-classes-blank-state" colspan="<?php echo absint( sizeof( $shipping_class_columns ) ); ?>"><p><?php _e( 'No Shipping classes have been created.', 'woocommerce' ); ?></p></td>
	</tr>
</script>

<script type="text/html" id="tmpl-wc-shipping-class-row">
	<tr data-id="{{ data.term_id }}">
		<?php
			foreach ( $shipping_class_columns as $class => $heading ) {
				echo '<td class="' . esc_attr( $class ) . '">';
				switch ( $class ) {
					case 'wc-shipping-class-name' :
						?>
						<div class="view">
							{{ data.name }}
							<div class="row-actions">
								<a class="wc-shipping-class-edit" href="#"><?php _e( 'Edit', 'woocommerce' ); ?></a> | <a href="#" class="wc-shipping-class-delete"><?php _e( 'Remove', 'woocommerce' ); ?></a>
							</div>
						</div>
						<div class="edit">
							<input type="text" name="name[{{ data.term_id }}]" data-attribute="name" value="{{ data.name }}" placeholder="<?php esc_attr_e( 'Shipping Class Name', 'woocommerce' ); ?>" />
							<div class="row-actions">
								<a class="wc-shipping-class-cancel-edit" href="#"><?php _e( 'Cancel changes', 'woocommerce' ); ?></a>
							</div>
						</div>
						<?php
					break;
					case 'wc-shipping-class-slug' :
						?>
						<div class="view">{{ data.slug }}</div>
						<div class="edit"><input type="text" name="slug[{{ data.term_id }}]" data-attribute="slug" value="{{ data.slug }}" placeholder="<?php esc_attr_e( 'Slug', 'woocommerce' ); ?>" /></div>
						<?php
					break;
					case 'wc-shipping-class-description' :
						?>
						<div class="view">{{ data.description }}</div>
						<div class="edit"><input type="text" name="description[{{ data.term_id }}]" data-attribute="description" value="{{ data.description }}" placeholder="<?php esc_attr_e( 'Description for your reference', 'woocommerce' ); ?>" /></div>
						<?php
					break;
					case 'wc-shipping-class-count' :
						?>
						<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=product&product_shipping_class=' ) ); ?>{{data.slug}}">{{ data.count }}</a>
						<?php
					break;
					default :
						do_action( 'woocommerce_shipping_classes_column_' . $class );
					break;
				}
				echo '</td>';
			}
		?>
	</tr>
</script>
