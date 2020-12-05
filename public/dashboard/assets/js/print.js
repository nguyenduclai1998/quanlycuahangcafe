
$('.printThis').printThis({
    afterPrint:  function() {
        window.location.href = "{{ route('create.billofsale')}}";
    },
});

