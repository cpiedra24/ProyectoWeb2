class CreateMeetings < ActiveRecord::Migration[5.1]
  def change
    create_table :meetings do |t|
      t.string :meeting_title
      t.date :meeting_date
      t.references :user, foreign_key: true
      t.boolean :virtual

      t.timestamps
    end
  end
end
