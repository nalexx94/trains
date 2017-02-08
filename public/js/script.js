$(function(){

    $(".tablesorter").tablesorter(
        {

            theme: 'blue',


            widthFixed: true,


            widgets: ["filter"],


            ignoreCase: false,

            widgetOptions: {


                filter_childRows: false,


                filter_childByColumn: false,


                filter_childWithSibs: true,


                filter_columnFilters: true,


                filter_columnAnyMatch: true,


                filter_cellFilter: '',


                filter_cssFilter: '', // or []


                filter_defaultFilter: {},


                filter_excludeFilter: {},


                filter_external: '',


                filter_filteredRow: 'filtered',


                filter_formatter: null,


                filter_functions: null,


                filter_hideEmpty: true,


                filter_hideFilters: false,


                filter_ignoreCase: true,


                filter_liveSearch: true,


                filter_matchType: {'input': 'exact'},

                  filter_onlyAvail: 'filter-onlyAvail',


                filter_placeholder: {search: '', select: ''},


                filter_reset: 'button.reset',


                filter_resetOnEsc: true,


                filter_saveFilters: false,


                filter_searchDelay: 300,


                filter_searchFiltered: true,


                filter_selectSource: null,


                filter_serversideFiltering: false,


                filter_startsWith: false,


                filter_useParsedData: false,


                filter_defaultAttrib: 'data-value',


                filter_selectSourceSeparator: '|'

            }


        }
    );

    $( "#datepicker" ).datepicker({
        minDate: new Date()
    });

    function getDayInText(day) {
        var day = day || 0;
        var everyDay = 'Ежедневно';
        var resText = '';
        switch (day) {
            case 0: resText = 'Пн';break;
            case 1: resText = 'Вт';break;
            case 2: resText = 'Ср';break;
            case 3: resText = 'Чт';break;
            case 4: resText = 'Пт';break;
            case 5: resText = 'Сб';break;
            case 6: resText = 'Вс';break;
        }

        return resText+'|'+everyDay;
    }

    $('#go-filter').on('click',function(){
        var date = $( "#datepicker" ).datepicker('getDate');
        if (!date) {
            date = new Date();
            $( "#datepicker" ).datepicker('setDate',date);
        }

        var textStation = $('#filter-country option:selected').text();
        console.log(textStation);

        var filters = $('table.tablesorter').find('input.tablesorter-filter');
        filters.eq(2).val(getDayInText(date.getDay()-1)).trigger('search', false);
        filters.eq(1).val(textStation).trigger('search', false);



    });

    $('#clear-filter').on('click',function() {
        var filters = $('table.tablesorter').find('input.tablesorter-filter');
        filters.val('').trigger('search', false);;

    });
});