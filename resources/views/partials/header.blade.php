<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{asset('css/main.css')}}" />

<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true
        });

        let str = '{{\Request::path()}}';
        str = str.split('/');

        let currMenu = 0;

        if (str[0] == 'dashboard') {
            currMenu = 0;
        } else if (str[0] == 'patient') {
            currMenu = 1;
        } else if (str[0] == 'company') {
            currMenu = 2;
        } else if (str[0] == 'cashiering') {
            currMenu = 3;
        } else if (str[0] == 'results') {
            currMenu = 4;
        } else if (str[0] == 'user') {
            currMenu = 5;
        }

        if (currMenu < 5) {
            let selected = $('.menu[data="' + currMenu + '"]');

            selected.addClass('bg-lime-1');
            $('svg path', selected).attr('style', 'fill:#fff');
        } else {
            let selected = $('.menu-2[data="' + (currMenu - 5) + '"]');

            selected.addClass('font-bold');
        }
        
        let url = ['/dashboard', '/patient/0/registration', '/company/0/registration', '/cashiering', '/results']

        $('.menu').mouseover(function() {
            let menuData = $(this).attr('data');

            if (currMenu != menuData) {
                let menu = $('.menu').not('[data=' + currMenu + ']');

                menu.removeClass('bg-lime-1');
                menu.addClass('bg-gray-1');

                $('svg', menu).each(function() {
                    $('path', this).attr('style', 'fill:#99ce34');
                });

                $(this).addClass('bg-lime-1');
                $('svg path', this).attr('style', 'fill:#fff');
            }
        });

        $('.menu').mouseout(function() {
            let menuData = $(this).attr('data');

            if (currMenu != menuData) {
                let menu = $('.menu').not('[data=' + currMenu + ']');

                menu.removeClass('bg-lime-1');

                $('svg', menu).each(function() {
                    $('path', this).attr('style', 'fill:#99ce34');
                });
            }
        });

        $('.menu-wrap div.menu').click(function() {
            location.href = url[$(this).index('.menu')];
        });

        
    });
</script>