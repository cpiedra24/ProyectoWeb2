class ApplicationController < ActionController::API
  # private

  def validate_user
    #obtener el token
    token = request.headers['Authorization']
    #si no existe retorne  a 401
    if token
    #si existe, cheque que la validacion funcione
    session = Session.where(token: token).first
    if !session
      render json: "{error: 'not a valid session'}".to_json, status: 401
    end
    else
      #else return 401
        render json: "{error: 'not a valid session'}".to_json, status: 401
    end
  end
end
