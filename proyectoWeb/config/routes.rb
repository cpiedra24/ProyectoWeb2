Rails.application.routes.draw do
  resources :tickets
  resources :meetings
  resources :contacts
  resources :clients
  resources :sessions
  resources :users
  # For details on the DSL available within this file, see http://guides.rubyonrails.org/routing.html
end
