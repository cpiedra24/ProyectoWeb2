class User < ApplicationRecord
  before_create :hash_password
  before_update :hash_pass
  has_many :sessions
  private
  def hash_password
    require 'digest/md5'
    self.password = Digest::MD5.hexdigest(password)
  end

  def hash_pass
    require 'digest/md5'
    self.password = Digest::MD5.hexdigest(password)
end
end
