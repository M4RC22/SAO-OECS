$(window).ready(() => {
    let actTitle = $('#actTitle');
    let startDate = $('#startDate');
    let endDate = $("#endDate");


    $('#actTable').on('submit', function(e){
        
        e.preventDefault();

        $('#items').append(
            `
            <tr>
                <th scope="row">${actTitle.val()}</th>
                <td>${startDate.val()}</td>
                <td>${endDate.val()}</td>
                <td><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
            </tr>
            `
        )

        $('.removeBtn').on('click', function(){
    
            $(this).closest('tr').remove();
        });
    })
});





