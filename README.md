# pmforms
Form API library for PocketMine-MP plugins using closures for handling data

## API documentation
There's no documentation yet, but you can check out the [demo plugin](https://github.com/dktapps-pm-pl/pmforms-demo) which shows how to use its API in a plugin.

## Including in other plugins
This library supports being included as a [virion](https://github.com/poggit/support/blob/master/virion.md).

If you use [Poggit](https://poggit.pmmp.io) to build your plugin, you can add it to your `.poggit.yml` like so:

```yml
projects:
  YourPlugin:
    libs:
      - src: dktapps-pm-pl/pmforms/pmforms
        version: ^2.1.0
```

```php
...
public function __construct(Main $main) {
		parent::__construct("Test Form",
		"Hello my friend!",
		[
			new MenuOption("Test Button", null, 0) //text, image, id
		],
		function (Player $player, int $option) use ($main): void {
			$id = $this->getOption($option)->getID();
			$action = new FormActions("menuform", $main->getConfig->get("form-actions"));
			$action->actionMenuForm($player, $id);
		}
		);
	}
...
```