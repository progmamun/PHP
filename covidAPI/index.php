<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>COVID19 API</title>
</head>
<body>
  <table width="500px" border="1px" cellspacing="0" cellpadding="8px">
    <tr>
      <td colspan="2"><h2>Global Data</h2></td>
    </tr>
    <tbody id="global-wise"></tbody>
  </table>
  <br>
  <table width="60%" border="1px" cellspacing="0" cellpadding="8px">
    <tr>
      <td colspan="8"><h2>Countries Data</h2></td>
    </tr>
    <tr bgcolor="pink">
    <th>S.No.</th>
    <th>Country</th>
    <th>NewConfirmed</th>
    <th>NewDeaths</th>
    <th>NewRecovered</th>
    <th>TotalConfirmed</th>
    <th>TotalDeaths</th>
    <th>TotalRecovered</th>
  </tr>
  <tbody id="country-wise"></tbody>
  </table>

  <script src="js/materialize.min.js"></script>
  <script src="js/jquery.js"></script>
  <script>
    $.ajax({
      url : "https://api.covid19api.com/summary",
      type : "GET",
      dataType : "JSON",
      success : function(data){
        console.log(data);
        // console.log(data.Countries[101]);
        // console.log(data.Countries[101].TotalConfirmed);

        $.each(data.Global, function(key, value){
          $("#global-wise").append("<tr><td bgcolor='yellow'>" + key +"</td><td>" + value + "</td></tr>");
        });

        var sno = 1;
        $.each(data.Countries, function(key, value){
          $("#country-wise").append("<tr>" +
                          "<td>" + sno +"</td>" + 
                          "<td>" + value.Country +"</td>" + 
                          "<td>" + value.NewConfirmed +"</td>" + 
                          "<td>" + value.NewDeaths +"</td>" + 
                          "<td>" + value.NewRecovered +"</td>" + 
                          "<td>" + value.TotalConfirmed +"</td>" + 
                          "<td>" + value.TotalDeaths +"</td>" + 
                          "<td>" + value.TotalRecovered +"</td>" + 
                          "</tr>");
        sno++;
        });
      }
    });
  </script>
</body>
</html>