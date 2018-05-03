class SessionsController < ApplicationController
  require 'digest/md5'
  # GET /sessions
  # POST /sessions
  def create
    #Verifica si existe el usuario en la base de datos
    #byebug
    username = session_params[:username]
    password = session_params[:password]
    password = Digest::MD5.hexdigest(password)
    user = User.where(username: username,password: password).first
  if user
       render json: "#{user.id}, #{user.user_type}".to_json,  status: :created
    end
  end

  # DELETE /sessions/1
  def destroy
      @sessions.destroy
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_session
      @session = Session.find(params[:id])
    end

    # Only allow a trusted parameter "white list" through.
    def session_params
      params.permit(:username, :password)
    end
end
