import SelectAllDropdown from './../../../../vendor/laravel/nova/resources/js/components/Dropdowns/SelectAllDropdown.vue'
import ActionSelector from './../../../../vendor/laravel/nova/resources/js/components/ActionSelector.vue'
import LensSelector from './../../../../vendor/laravel/nova/resources/js/components/LensSelector.vue'
import FilterMenu from './../../../../vendor/laravel/nova/resources/js/components/FilterMenu.vue'
import DeleteMenu from './../../../../vendor/laravel/nova/resources/js/components/DeleteMenu.vue'

window.__ = function (key, replacements) {}

Vue.component('SelectAllDropdown', SelectAllDropdown)
Vue.component('ActionSelector', ActionSelector)
Vue.component('LensSelector', LensSelector)
Vue.component('FilterMenu', FilterMenu)
Vue.component('DeleteMenu', DeleteMenu)
Vue.mixin({
  methods: {
    __(key, replacements) {
      return __(key, replacements)
    },
  }
})
