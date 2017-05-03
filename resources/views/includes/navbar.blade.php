<div class="navbar-custom">
    <div class="container">
        <div id="navigation">
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="{{ route('panel') }}"><i class="md md-home"></i>Dashboard</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="md md-settings"></i>Bot</a>
                    <ul class="submenu">
                        <li><a href="{{ route('bot.edit') }}">General Settings</a></li>
                        <li class="has-submenu">
                            <a href="#">Lists</a>
                            <ul class="submenu">
                                <li><a href="{{ route('bot.staff') }}">Staff</a></li>
                                <li><a href="{{ route('bot.autotemp') }}">AutoTemp</a></li>
                                <li><a href="{{ route('bot.snitch') }}">Snitch</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Behavior Manager</a>
                            <ul class="submenu">
                                <li><a href="#">Responses</a></li>
                                <li><a href="#">Bad Words</a></li>
                                <li><a href="#">Link Filter</a></li>
                                <li><a href="{{ route('bot.botlang') }}">Bot Messages</a></li>
                                <li><a href="#">Hangman Words</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Command Manager</a>
                            <ul class="submenu">
                                <li><a href="{{ route('bot.minrank') }}">Minranks</a></li>
                                <li><a href="{{ route('bot.alias') }}">Aliases</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Bot Powers</a></li>
                        <li><a href="#">Chat Logs</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="md md-pages"></i>Pages</a>
                    <ul class="submenu">
                        <li><a href="{{ route('chat') }}">Chat</a></li>
                        <li><a href="#">Commands</a></li>
                        <li><a href="#">Get Premium</a></li>
                        <li><a href="#">Ocean Staff</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="md md-help"></i>Support</a>
                </li>
            </ul>
        </div>
    </div>
</div>