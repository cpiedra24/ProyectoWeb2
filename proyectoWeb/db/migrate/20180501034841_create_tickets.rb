class CreateTickets < ActiveRecord::Migration[5.1]
  def change
    create_table :tickets do |t|
      t.string :problem_title
      t.string :detail
      t.string :who_report
      t.references :client, foreign_key: true
      t.string :status

      t.timestamps
    end
  end
end
