<?php if (isset($component)) { $__componentOriginalbfafd1d86bb8d27e74283af0a624ee96a2827b79 = $component; } ?>
<?php $component = App\View\Components\Template::resolve([] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('template'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Template::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>TES <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfafd1d86bb8d27e74283af0a624ee96a2827b79)): ?>
<?php $component = $__componentOriginalbfafd1d86bb8d27e74283af0a624ee96a2827b79; ?>
<?php unset($__componentOriginalbfafd1d86bb8d27e74283af0a624ee96a2827b79); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\MPPL\desaboard\resources\views/kelahiran.blade.php ENDPATH**/ ?>