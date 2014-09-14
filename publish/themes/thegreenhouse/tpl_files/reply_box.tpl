       
       <div class="post">
       <h2 class="title">{add_reply}</h2>
       <form action="{comments_url}" method="post">
       <div class="story">
					<p>
					<input type="hidden" name="process" value="1" />
					<input type="hidden" name="id" value="{id}" />
					<label>{name}:</label>
					<input name="name" type="text" size="30" value="{name_value}" />{name_error}<br /><br />
					<label>{email}:</label>
					<input name="email" type="text" size="30" value="{email_value}" />{email_error}<br /><br />
					<label>{comments}:</label>
					<textarea name="comments" rows="5" cols="40">{comments_value}</textarea>{comments_error}<br />	
					{captcha}
          <input type="submit" class="button" value="{submit}" title="{submit}" />		
					</p>
        </div>  					
				</form>
				</div>

        <p>&nbsp;</p>
