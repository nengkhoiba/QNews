<html>
	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	</head>
	<style>
		/*
Ref:
Thanks to:
http://www.jqueryscript.net/layout/Simple-jQuery-Plugin-To-Create-Pinterest-Style-Grid-Layout-Pinterest-Grid.html
*/

body {
 background-color:#ffffff;   
}    

#pinBoot {
  position: relative;
  max-width: 100%;
  width: 100%;
}
img {
  width: 100%;
  max-width: 100%;
  height: auto;
}
.white-panel {
  position: absolute;
  background: white;
  box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
  padding: 10px;
}
/*
stylize any heading tags withing white-panel below
*/

.white-panel h1 {
  font-size: 1em;
}
.white-panel h1 a {
  color: #A92733;
}
.white-panel:hover {
  box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
  margin-top: -5px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
	</style>
	
<script type="text/javascript">
$(document).ready(function() {
	$('#pinBoot').pinterest_grid({
	no_columns: 4,
	padding_x: 10,
	padding_y: 10,
	margin_bottom: 50,
	single_column_breakpoint: 700
	});
	});

	/*
	Ref:
	Thanks to:
	http://www.jqueryscript.net/layout/Simple-jQuery-Plugin-To-Create-Pinterest-Style-Grid-Layout-Pinterest-Grid.html
	*/


	/*
	    Pinterest Grid Plugin
	    Copyright 2014 Mediademons
	    @author smm 16/04/2014

	    usage:

	     $(document).ready(function() {

	        $('#blog-landing').pinterest_grid({
	            no_columns: 4
	        });

	    });


	*/
	;(function ($, window, document, undefined) {
	    var pluginName = 'pinterest_grid',
	        defaults = {
	            padding_x: 10,
	            padding_y: 10,
	            no_columns: 3,
	            margin_bottom: 50,
	            single_column_breakpoint: 700
	        },
	        columns,
	        $article,
	        article_width;

	    function Plugin(element, options) {
	        this.element = element;
	        this.options = $.extend({}, defaults, options) ;
	        this._defaults = defaults;
	        this._name = pluginName;
	        this.init();
	    }

	    Plugin.prototype.init = function () {
	        var self = this,
	            resize_finish;

	        $(window).resize(function() {
	            clearTimeout(resize_finish);
	            resize_finish = setTimeout( function () {
	                self.make_layout_change(self);
	            }, 11);
	        });

	        self.make_layout_change(self);

	        setTimeout(function() {
	            $(window).resize();
	        }, 500);
	    };

	    Plugin.prototype.calculate = function (single_column_mode) {
	        var self = this,
	            tallest = 0,
	            row = 0,
	            $container = $(this.element),
	            container_width = $container.width();
	            $article = $(this.element).children();

	        if(single_column_mode === true) {
	            article_width = $container.width() - self.options.padding_x;
	        } else {
	            article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
	        }

	        $article.each(function() {
	            $(this).css('width', article_width);
	        });

	        columns = self.options.no_columns;

	        $article.each(function(index) {
	            var current_column,
	                left_out = 0,
	                top = 0,
	                $this = $(this),
	                prevAll = $this.prevAll(),
	                tallest = 0;

	            if(single_column_mode === false) {
	                current_column = (index % columns);
	            } else {
	                current_column = 0;
	            }

	            for(var t = 0; t < columns; t++) {
	                $this.removeClass('c'+t);
	            }

	            if(index % columns === 0) {
	                row++;
	            }

	            $this.addClass('c' + current_column);
	            $this.addClass('r' + row);

	            prevAll.each(function(index) {
	                if($(this).hasClass('c' + current_column)) {
	                    top += $(this).outerHeight() + self.options.padding_y;
	                }
	            });

	            if(single_column_mode === true) {
	                left_out = 0;
	            } else {
	                left_out = (index % columns) * (article_width + self.options.padding_x);
	            }

	            $this.css({
	                'left': left_out,
	                'top' : top
	            });
	        });

	        this.tallest($container);
	        $(window).resize();
	    };

	    Plugin.prototype.tallest = function (_container) {
	        var column_heights = [],
	            largest = 0;

	        for(var z = 0; z < columns; z++) {
	            var temp_height = 0;
	            _container.find('.c'+z).each(function() {
	                temp_height += $(this).outerHeight();
	            });
	            column_heights[z] = temp_height;
	        }

	        largest = Math.max.apply(Math, column_heights);
	        _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
	    };

	    Plugin.prototype.make_layout_change = function (_self) {
	        if($(window).width() < _self.options.single_column_breakpoint) {
	            _self.calculate(true);
	        } else {
	            _self.calculate(false);
	        }
	    };

	    $.fn[pluginName] = function (options) {
	        return this.each(function () {
	            if (!$.data(this, 'plugin_' + pluginName)) {
	                $.data(this, 'plugin_' + pluginName,
	                new Plugin(this, options));
	            }
	        });
	    }

	})(jQuery, window, document);
</script>

<body>
<div class="container">
  <div class="row">
    <h2>Qnews</h2>

    </p>
    <hr>
    <section id="pinBoot">
<?php include_once("config.php"); 

$sql="SELECT 
con.ID,
con.title,
cat.Name AS category,
con.body,
con.image,
DATE(con.posted_on) AS posted_on,
TIME(con.posted_on) AS posted_at,
usr.Name AS posted_by	
FROM content con
LEFT JOIN category cat ON cat.ID=con.cat_id
LEFT JOIN user usr ON usr.ID=con.posted_by
WHERE con.isActive=1

ORDER BY con.posted_on DESC
		";

$result= mysqli_query($link, $sql);


if(!$result)
{
	die('could not get data');

}
while($row= mysqli_fetch_assoc($result))
{
	$now=strtotime(date("Y-m-d"));
	$past=strtotime($row['posted_on']);
	$diff=$now-$past;
	$day=floor($diff/(60*60*24));
	if($day==0)
	{

		$diff=strtotime(date("H:i:s"))-strtotime($row['posted_at']);

		$temp=$diff/86400; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day

		// days
		$days=floor($temp);$temp=24*($temp-$days);
		// hours
		$hours=floor($temp);$temp=60*($temp-$hours);
		// minutes
		$minutes=floor($temp); $temp=60*($temp-$minutes);
		// seconds
		$seconds=floor($temp);

		if($hours==0){
			if($minutes==0){
				$day=$seconds." sec ago";
			}else{
				$day=$minutes." mins ago";
			}

		}else{
			$day=$hours." hrs ago";
		}

	}else
	{
		if($day<=31){
			$day=$day." day(s) ago.";
		}else{
				
			$day=ceil($day/30);
			if($day<=12)
			{
				$day=$day." month(s) ago.";
			}else{
				$day=ceil($day/12);
				$day=$day." year(s) ago.";
			}
		}
	}
	
	?>
	
	<article class="white-panel">
	<?php if($row['image']!="" && $row['image']!=null && $row['image']!="NO"){
					?>
					<img src="<?php echo $row['image'];?>">
					<?php 
				}?>
        <h4><a href="<?php echo $base_url."/news.php?id=".$row['ID']?>"><?php echo $row['title'];?></a></h4>
        <h6 style="color:#aaa"><?php echo $row['category'];?></h6>
        <p><?php echo $row['body'];?></p>
         <h6 style="color:#aaa"><?php echo $day;?></h6>
      </article>
	<?php 
	
}

?>
      

     

    </section>


    <hr>


  </div>
  

</div>
</body>
</html>