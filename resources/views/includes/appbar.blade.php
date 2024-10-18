<header class="app-bar">
    <table width="100%">
        <tr>
            <td>
                <button onclick="goBack()" style="background-color: rgb(25, 120, 179)">Retour</button>

            </td>
            <td class="text-right">
                <a href="{{ route('auth.create') }}">
                    <b>Paramètres</b>
                </a>
            </td>
        </tr>
    </table>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</header>