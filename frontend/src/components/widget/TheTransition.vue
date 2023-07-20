<template>
   <Transition name="error" mode="out-in">
      <slot></slot>
    </Transition>
</template>

<script>

</script>

<style scoped>
.error-enter-active,
.error-leave-active {
  transition: opacity 0.5s ease;
}

.error-enter-from,
.error-leave-to {
  opacity: 0;
}
</style>