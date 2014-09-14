       
       <h1>{add_reply}</h1>
       
       <form action="{comments_url}" method="post">			
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
				</form>

        <p>&nbsp;</p>
