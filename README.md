# WallaceMaxters/BladePetiteVue

Use petite-vue with Blade views in Laravel



### 

```php
<html>

<head>

@petitevue
</head>

<body>
  <x-petite-vue :props="['name' => 'Wallace']">
      The current url is:
      <span x-text="$page.url" />

      My name is @{{ name }} 

      This is another value @{{ anotherValue }}

      <button @@click="changeName"></button>

      <x-slot :script>
        <script>
        function (props) {
          return {
            ...props,
            anotherValue: 5,
            changeName() {
              this.name = 'Maxters';
            }
          }
        }
        </script>
      </x-slot>
  </x-petite-vue>
</body>
</html>
```
