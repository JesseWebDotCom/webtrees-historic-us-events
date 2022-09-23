<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2020 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */ 
 
declare(strict_types=1);

namespace JessewebDotCom\WebtreesModules\History\us_events;

use Fisharebest\Localization\Translation;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Module\ModuleHistoricEventsTrait;
use Fisharebest\Webtrees\Module\ModuleHistoricEventsInterface;
use Illuminate\Support\Collection;

return new class extends AbstractModule implements ModuleCustomInterface, ModuleHistoricEventsInterface {
    use ModuleCustomTrait;
    use ModuleHistoricEventsTrait;

    public const CUSTOM_TITLE = 'United States Historic Events 🇺🇸';

    public const CUSTOM_AUTHOR = 'JessewebDotCom';
    
    public const CUSTOM_WEBSITE = 'https://github.com/JesseWebDotCom/webtrees-historic-us-events';
    
    public const CUSTOM_VERSION = '1.1';

    public const CUSTOM_LAST = 'https://github.com/JesseWebDotCom/webtrees-historic-us-events';

    /**
     * Constructor.  The constructor is called on *all* modules, even ones that are disabled.
     * This is a good place to load business logic ("services").  Type-hint the parameters and
     * they will be injected automatically.
     */
    public function __construct()
    {
        // NOTE:  If your module is dependent on any of the business logic ("services"),
        // then you would type-hint them in the constructor and let webtrees inject them
        // for you.  However, we can't use dependency injection on anonymous classes like
        // this one. For an example of this, see the example-server-configuration module.
    }

    /**
     * Bootstrap.  This function is called on *enabled* modules.
     * It is a good place to register routes and views.
     *
     * @return void
     */
    public function boot(): void
    {
    }

    /**
     * How should this module be identified in the control panel, etc.?
     *
     * @return string
     */
    public function title(): string
    {
        return self::CUSTOM_TITLE;
    }

    /**
     * A sentence describing what this module does.
     *
     * @return string
     */
    public function description(): string
    {
        return I18N::translate('US Historical facts - major events affecting the United States');
    }

    /**
     * The person or organisation who created this module.
     *
     * @return string
     */
    public function customModuleAuthorName(): string
    {
        return self::CUSTOM_AUTHOR;
    }

    /**
     * The version of this module.
     *
     * @return string
     */
    public function customModuleVersion(): string
    {
        return self::CUSTOM_VERSION;
    }

    /**
     * A URL that will provide the latest version of this module.
     *
     * @return string
     */
        public function customModuleLatestVersionUrl(): string
    {
        return self::CUSTOM_LAST;
    }

    /**
     * Where to get support for this module.  Perhaps a github respository?
     *
     * @return string
     */
    public function customModuleSupportUrl(): string
    {
        return self::CUSTOM_WEBSITE;
    }

    /**
     * Should this module be enabled when it is first installed?
     *
     * @return bool
     */
    public function isEnabledByDefault(): bool
    {
        return false;
    }

    /**
     * Where does this module store its resources
     *
     * @return string
     */
    public function resourcesFolder(): string
    {
        return __DIR__ . '/resources/';
    }

    /**
     * Structure of events provided by this module:
     * 
     * Each line is a GEDCOM style record to describe an event (EVEN), including newline chars (\n);
     *      1 EVEN <long name>
     *      2 TYPE <short name>
     *      2 DATE <date period>
     *      2 NOTE [wikipedia](<link>)
     *
     * markdown is used for NOTE;
     * markdown should be enabled for your tree (see Control panel / Manage family trees / Preferences and then scroll down to "Text" and mark the option "markdown");
     * is markdown is disabled the links are still working (blank at the end is necessary), but the formatting isn't so nice;
     */
    
    public function historicEventsAll(): Collection
    {
        return new Collection([
            "1 EVEN Global war between the Allies (France, Great Britain, Russia, Italy, Japan, the United States) and the Central Powers (Germany, Austria-Hungary, Turkey and Bulgaria) \n2 TYPE World War I\n2 DATE FROM 28 JUL 1914 TO 11 NOV 1918\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/World_War_I)",
            "1 EVEN Worldwide economic depression \n2 TYPE Great Depression\n2 DATE FROM AUG 1929 TO 1939\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/Great_Depression)",
            "1 EVEN War between Axis Powers (Germany, Italy, Japan) and the Allied Powers (Britain, United States, Soviet Union, France) \n2 TYPE World War II\n2 DATE FROM 1 SEP 1939 TO 2 SEP 1945\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/World_War_II)",
            "1 EVEN Imperial Japanese Navy Air attack the US Pearl Harbor naval base \n2 TYPE Attack on Pearl Harbor\n2 DATE 7 DEC 1941\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/Attack_on_Pearl_Harbor)",
            "1 EVEN War between North Korea and South Korea \n2 TYPE Korean War\n2 DATE FROM 25 JUN 1950 TO 27 JUL 1953\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/Korean_War)",
            "1 EVEN War between North Vietnam against South Vietnam \n2 TYPE Vietnam War\n2 DATE FROM 1 NOV 1955 TO 30 APR 1975\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/Korean_War)",
            "1 EVEN Assassination of United States president John F. Kennedy \n2 TYPE John F. Kennedy Assassination \n2 DATE 22 NOV 1963\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/Assassination_of_John_F._Kennedy)",
            "1 EVEN Assassination of Baptist minister and civil rights leader Martin Luther King Jr. \n2 TYPE Martin Luther King, Jr. Assassination \n2 DATE 4 APR 1968\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/Assassination_of_Martin_Luther_King_Jr.)",
            "1 EVEN Apollo 11 Moon landing\n2 TYPE Moon landing\n2 DATE 20 JUL 1969\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/Moon_landing)",
            "1 EVEN Explosion of the U.S. space shuttle orbiter Challenger, shortly after its launch \n2 TYPE Space Shuttle Challenger disaster\n2 DATE 28 JAN 1986\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/Space_Shuttle_Challenger_disaster)",
            "1 EVEN International conflict triggered by Iraq's invasion of Kuwait \n2 TYPE Gulf War\n2 DATE FROM 2 AUG 1990 TO 28 FEB 1991\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/Gulf_War)",
            "1 EVEN Projected but mostly unrealized havoc on computerized systems during the transition from the year 1999 to 2000 \n2 TYPE Y2K \n2 DATE 1 JAN 2000\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/Year_2000_problem)",
            "1 EVEN Terrorists attack World Trade Center and Pentagon \n2 TYPE September 11 attacks (9/11)\n2 DATE 11 SEP 2001\n2 NOTE [wikipedia](https://wikipedia.org/wiki/September_11_attacks)",
            "1 EVEN Ongoing global pandemic of coronavirus disease 2019 (COVID-19) \n2 TYPE COVID-19 pandemic\n2 DATE FROM 17 NOV 2019\n2 NOTE [wikipedia](https://en.wikipedia.org/wiki/COVID-19_pandemic)",
        ]);
    }
    
};